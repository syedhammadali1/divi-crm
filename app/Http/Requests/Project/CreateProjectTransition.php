<?php

namespace App\Http\Requests\Project;

use App\Models\project_transition;
use App\Models\projects;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Bouncer;

class CreateProjectTransition extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('add-transition');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'projectnum' => ['required'],
            'transid' => ['required', 'string'],
            'lastremainamount' => ['required', 'min:0'],
            'upfrontamount' => ['required', 'min:1'],
            'remainamount' => ['required', 'min:0'],
        ];
    }

    public function handle()
    {

        $this->validated();
        $params = $this->all();

        if (count($params['package']) >= 2 && in_array('wholeproj', $params['package'])) {
            return false;
        }

        $project = projects::with('brand')->where('project_number', $params['projectnum'])->first();

        $project->paid_cost = $params['upfrontamount'] + $project->paid_cost;
//        $project->remaining_cost = $params['remainamount'] ;


        $project_trans = new project_transition();

        $project_trans->emp_id = Auth::user()->emp_id;
        $project_trans->brand_id = $project->brand->id;
        $project_trans->project_id = $project->id;

        if (count($params['package']) >= 1 && in_array('wholeproj', $params['package'])) {
            $project_trans->package_id = 0;
            $project_trans->transition_id = $params['transid'];
            $project_trans->total_cost = $params['lastremainamount'];
            $project_trans->paid_cost = $params['upfrontamount'];

            if (0 < $params['remainamount']) {
                $project->remaining_cost = $params['remainamount']; // for project
                $project_trans->remain_cost = $params['remainamount']; // for project transition
            } else {
                $project->remaining_cost = 0;
                $project_trans->remain_cost = 0;
            }

//        $project_trans->remain_cost  = $params['response'] ; // Todo for response
            $project_trans->save();

            $project->save();

            return true;
        } else if (!in_array('wholeproj', $params['package'])) {
            $project_trans->package_id = null;
            $project_trans->transition_id = $params['transid'];
            $project_trans->total_cost = $params['lastremainamount'];
            $project_trans->paid_cost = $params['upfrontamount'];

            if (0 < $params['remainamount']) {
                $project_trans->remain_cost = $params['remainamount']; // for project transition
            } else {
                $project_trans->remain_cost = 0;
            }
            $project_trans->save();
//            dd($project_trans);

            foreach ($params['package'] as $item) {
                if ($item != 'wholeproj') {
                    $project_transinner = new project_transition();
                    $project_transinner->emp_id = Auth::user()->emp_id;
                    $project_transinner->brand_id = $project->brand->id;
                    $project_transinner->project_id = $project->id;

                    $project_transinner->package_id = $item;
                    $project_transinner->parent_id = $project_trans->id;

                    $project_transinner->transition_id = null;
                    $project_transinner->total_cost = 0;
                    $project_transinner->paid_cost = 0;
                    $project_transinner->remain_cost = 0;
                    $project_transinner->save();
                }
            }
            return true;
        }

        return false;
    }
}

