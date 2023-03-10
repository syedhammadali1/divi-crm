<?php

namespace App\Http\Requests\Dashboard;

use App\Models\AssigneeBrandTarget;
use App\Models\brand;
use App\Models\brand_target;
use App\Models\project_task;
use App\Models\project_task_label;
use App\Models\projects;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetDashboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function handle()
    {

        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        if ($userRole == "sales") {
            $projectsCount = projects::where('user_id', $user->emp_id)->get()->count();

            $projectsCostCount = projects::where('user_id', $user->emp_id)->pluck('project_cost')->sum();

            $projectTasksCount = project_task::where('user_id', $user->emp_id)->get()->count();

            $projectTasksCompleteCount = project_task::where('status', 'Completed')->where('user_id', $user->emp_id)->get()->count();

            $currentYearMonth = date('Y-m-01');

            $currentMonthTarget = AssigneeBrandTarget::where('assigner_emp_id', $user->emp_id)->where('target_month', $currentYearMonth)->pluck('target_amount')->sum();

            $currentMonthAchievedTarget = AssigneeBrandTarget::where('assigner_emp_id', $user->emp_id)->where('target_month', $currentYearMonth)->pluck('achieved_amount')->sum();

            return [
                'projectsCount' => $projectsCount,
                'projectTasksCount' => $projectTasksCount,
                'projectTasksCompleteCount' => $projectTasksCompleteCount,
                'projectsCostCount' => $projectsCostCount,
                'currentMonthTarget' => $currentMonthTarget,
                'currentMonthAchievedTarget' => $currentMonthAchievedTarget,
            ];
        } elseif ($userRole == "client") {
            $projectsCount = projects::where('client_id', $user->id)->get()->count();

            $myProjects = projects::with('brand')->where('client_id', $user->id)->get();

            $projectCompleteCount = projects::where('status', 'Completed')->where('client_id', $user->id)->get()->count();

            return [
                'projectsCount' => $projectsCount,
                'myProjects' => $myProjects,
                'projectCompleteCount' => $projectCompleteCount,
            ];
        } elseif ($userRole == "production manager") {

            $projectsCount = projects::where('manager_id', $user->emp_id)->get()->count();

            $projectsCompleteCount = projects::where('manager_id', $user->emp_id)->where('status', 'Completed')->get()->count();

            $projectTasksCount = project_task::with('projectsById')->whereHas('projectsById', function (Builder $query) use ($user) {
                $query->where('manager_id', $user->emp_id);
            })->get()->count();

            $projectTasksCompleteCount = project_task::with('projectsById')->where('status', 'Completed')->whereHas('projectsById', function (Builder $query) use ($user) {
                $query->where('manager_id', $user->emp_id);
            })->get()->count();

            $project_tasks = projects::with('projectTasks')->where('manager_id', $user->emp_id)->get();

            return [
                'projectsCount' => $projectsCount,
                'projectsCompleteCount' => $projectsCompleteCount,
                'projectTasksCount' => $projectTasksCount,
                'projectTasksCompleteCount' => $projectTasksCompleteCount,
                'project_tasks' => $project_tasks,
            ];

        } elseif ($userRole == "team lead") {

            $projectsCount = projects::with('projectTasks')->whereHas('projectTasks', function (Builder $query) use ($user) {
                $query->where('dpt_to', $user->emp_id);
            })->get()->count();

            $projectTasksCount = project_task::where('dpt_to', $user->emp_id)->get()->count();

            $projectTasksCompleteCount = project_task::where('status', 'Completed')->where('dpt_to', $user->emp_id)->get()->count();

            $project_tasks = project_task::where('dpt_to', $user->emp_id)->get();

            return [
                'projectsCount' => $projectsCount,
                'projectTasksCount' => $projectTasksCount,
                'projectTasksCompleteCount' => $projectTasksCompleteCount,
                'project_tasks' => $project_tasks,
            ];
        } elseif ($userRole == "developer") {

            $projectTasksCount = project_task_label::where('type', 1)->where('title', $user->emp_id)->get()->count();

            $projectTasksCompleteCount = project_task_label::with('taskInfo')->where('type', 1)->where('title', $user->emp_id)
                ->whereHas('taskInfo', function (Builder $query) {
                    $query->where('status', 'Completed');
                })->get()->count();

            $project_tasks = project_task_label::with('taskInfo')
                ->where("type", 1)
                ->where("title", $user->emp_id)
                ->where("is_active", 1)
                ->where("is_deleted", 0)
                ->get();

            $project_tasks_main = project_task::where("dpt_to", $user->emp_id)->get();

            return [
                'project_tasks' => $project_tasks,
                'project_tasks_main' => $project_tasks_main,
                'projectTasksCount' => $projectTasksCount,
                'projectTasksCompleteCount' => $projectTasksCompleteCount,
            ];
        } elseif ($userRole == "admin") {
            $projectsCount = projects::all()->count();

            $projectTasksCount = project_task::all()->count();

            $projectTasksCompleteCount = project_task::where('status', 'Completed')->get()->count();

            $projectsCostCount = projects::pluck('project_cost')->sum();

            $totalEmployeeCount = User::where('type', 2)->get()->count();

            $totalClientCount = User::where('type', 1)->get()->count();

            $totalBrandCount = brand::all()->count();

            $totalBrandTargetsCount = brand_target::all()->count();

            $previousMonth = Carbon::now()->subMonth()->format('M');

            $previousYear = Carbon::now()->subYear()->format('Y');

            $currentMonth = date('M');

            $currentYear = date('Y');

            $allCurrentYearProjects = DB::table('projects')->whereYear('created_at', $currentYear)->selectRaw("id,SUM(paid_cost) as total ,MONTH(created_at) as month ,Year(created_at) as year")->groupBy("month")->get();

            if (!$allCurrentYearProjects->isEmpty()) {
                $grapher_sale = '';

                if ($allCurrentYearProjects) {
                    $w_var = '';
                    foreach ($allCurrentYearProjects as $key => $graph) {
                        $monthNum = $graph->month;
                        $dateObj = DateTime::createFromFormat('!m', $monthNum);
                        $monthName = $dateObj->format('M');
                        $grapher_sale = $grapher_sale . "['" . $monthName . "-" . $graph->year . "'," . $graph->total . "],";
                        $w_var .= "['{$monthName}-{$graph->year}',{$graph->total}],";
                    }
                    $w_var = rtrim($w_var, ",");
                }
                $grapher_sale = $w_var;

                $allCurrentYearProjectsData = $grapher_sale;
            } else {
                $allCurrentYearProjectsData = "['Jan-2021',0]";
            }

            return [
                'projectsCount' => $projectsCount,
                'projectTasksCount' => $projectTasksCount,
                'projectTasksCompleteCount' => $projectTasksCompleteCount,
                'projectsCostCount' => $projectsCostCount,
                'totalEmployeeCount' => $totalEmployeeCount,
                'totalClientCount' => $totalClientCount,
                'totalBrandCount' => $totalBrandCount,
                'totalBrandTargetsCount' => $totalBrandTargetsCount,
                'allCurrentYearProjectsData' => $allCurrentYearProjectsData,
            ];
        } elseif ($userRole == "hod sales and support") {
            $projectsCount = projects::all()->count();

            $projectTasksCount = project_task::all()->count();

            $projectTasksCompleteCount = project_task::where('status', 'Completed')->get()->count();

            $projectsCostCount = projects::pluck('project_cost')->sum();

            $totalBrandCount = brand::all()->count();

            $totalBrandTargetsCount = brand_target::all()->count();
            return [
                'projectsCount' => $projectsCount,
                'projectTasksCount' => $projectTasksCount,
                'projectTasksCompleteCount' => $projectTasksCompleteCount,
                'projectsCostCount' => $projectsCostCount,
                'totalBrandCount' => $totalBrandCount,
                'totalBrandTargetsCount' => $totalBrandTargetsCount,
            ];
        } else {
            return [];
        }
    }
}
