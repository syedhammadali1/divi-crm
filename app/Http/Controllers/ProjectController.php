<?php

namespace App\Http\Controllers;

use App\Events\MessageNotification;
use App\Http\Requests\Brand\GetAllBrandsRequest;
use App\Http\Requests\Project\CreateProjectTransition;
use App\Http\Requests\Project\DesignProjectRequest;
use App\Http\Requests\Project\DevelopmentProjectRequest;
use App\Models\AcademicLevels;
use App\Models\brand;
use App\Models\brandEmployee;
use App\Models\BrandSourceAccount;
use App\Models\ClientPartner;
use App\Models\ContentProject;
use App\Models\ContentProjectTypes;
use App\Models\Country;
use App\Models\Currency;
use App\Models\DesignProject;
use App\Models\DevelopmentProject;
use App\Models\Industry;
use App\Models\NumberOfWords;
use App\Models\OtherProject;
use App\Models\project_transition;
use App\Models\ProjectReviews;
use App\Models\ReferenceStyles;
use App\Models\SeoProject;
use App\Models\TasksComment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Requests\RequestProjects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\packages;
use App\Models\projects;
use App\Models\project_package;
use App\Models\project_attachment;
use App\Models\project_task;
use App\Models\project_task_label;
use App\Models\notifications;
use App\Models\project_thread;

use Session;
use Helper;
use Hash;
use View;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $notifications;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:view-project', ['only' => ['viewbrandproject']]);
        $this->middleware('can:add-project', ['only' => ['createproject','project_submit',]]);
        $this->middleware('can:view-task', ['only' => ['projecttask']]);
        $this->middleware('can:add-task', ['only' => ['createtask','projecttask_submit',]]);
//        $this->middleware(function ($request, $next) {
//            $this->notifications = notifications::where("receiver" , Auth::user()->emp_id)->get();
//            return $next($request);
//        });
//
//         $this->middleware(function ($request, $next) {
//             $this->user = Auth::user();
////             dd($this->user);
//             return $next($request);
//         });
        //dd($this->notifications);

        // Todo Make this dynamic and remove eloquent from header blade file
        // $notifications = notifications::get();
        // View::share('notifications', $notifications);
    }

    public function readnotifications(Request $request){
        $notifyids =  explode(',',$request->notifyIds);
        $notify =  notifications::whereIn('id',$notifyids)->get();
        foreach ($notify as $item){
            $item->is_read = 1;
            $item->save();
        }
        return true;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payroller()
    {
        return view('payroll/payroller');
    }

    public function createproject()
    {
      $packages = packages::where("is_active" ,1)->get();
      $managers = User::whereIs('production manager')->where("is_active" ,1)->where("is_deleted" ,0)->get(); // TODO Imp Info. For Get Any User / Employee As Per Role Simply add-> whereIs('role name')
      $brandmanagers = User::whereIs('brand manager')->where("is_active" ,1)->where("is_deleted" ,0)->get();
      $supportpersons = User::whereIs('support')->where("is_active" ,1)->where("is_deleted" ,0)->get();

      $clients =  User::where("type" ,1)->get();

    $getAllBrandsRequest = new GetAllBrandsRequest();

    $allBrands = $getAllBrandsRequest->handle();

      return view('project/createproject')->with(compact('packages','managers', 'brandmanagers', 'allBrands' , 'clients', 'supportpersons'));
    }

    public function project_submit(RequestProjects $request)
    {
//        dd($request); //create a partner with loop -> email and other items by loop key
      $client = User::where("type" , 1)->where("email" , $request->client_email)->first();
      if (!$client) {
        // Create New Client if not exist
        $client = new User;
        $client->type = 1;
        $client->name = $request->client_name;
        $client->email = $request->client_email;
        $client->phonenumber = $request->client_phone;
        $slug = Str::slug($request->client_name);
        $client->password = Hash::make($slug);
        $client->save();
        $client->assign('client');
      }

      $user = Auth::user();

      $projects = new projects;
      $projects->name = $request->name;
      $projects->user_id = $user->emp_id; //Sales user Id change to emp_id
      $projects->client_id = $client->id;
      $projects->brand_id = $request->brands;
      $projects->support_id = $request->supportperson; // support person
      $projects->projownertype = $request->projownertype;
      $projects->project_package = serialize($request->project_package);
      $projects->client_name = $request->client_name;
      $projects->client_email = $request->client_email;
      $projects->manager_id = $request->project_manager;
      $projects->brand_id = $request->brands;
      $projects->client_phone = $request->client_phone;
      $projects->project_cost = $request->project_cost;
      $projects->paid_cost = $request->paid_cost;
      $projects->remaining_cost = $request->remain_cost;
      $projects->project_type = $request->project_type;
      $projects->project_priority = $request->project_priority;
      $projects->project_details = $request->project_details;

      $dt = date("dmY");
      $string = $this->str_random(6);
      $projects->project_number = "Project-".$string."-".$dt;
      $projects->save();
      // Create packages list for this project
      foreach ($request->project_package as $key => $value) {
        $project_package = new project_package;
        $project_package->project_id = $projects->id;
        $project_package->package_id = $value;
        $project_package->save();
      }

      // Create project attachment
      if (isset($request->attachment_path_id)){
          foreach ($request->attachment_path_id as $key => $value) {
              $project_attachment = new project_attachment;
              $project_attachment->project_id = $projects->id;
              $project_attachment->path = $value;
              $project_attachment->save();
          }
      }
      $brandName = brand::find($request->brands);

      $project_trastran = new project_transition;

        $project_trastran->emp_id = $user->emp_id;
        $project_trastran->brand_id  = $brandName->id;
        $project_trastran->project_id = $projects->id;
        $project_trastran->transition_id = $request->trans_id;
        $project_trastran->total_cost = $request->project_cost;
        $project_trastran->paid_cost = $request->paid_cost;
        $project_trastran->remain_cost = $request->remain_cost;
        $project_trastran->save();

        if ($request->projownertype == "partner"){
            foreach ($request->partner_email as $key => $item){
                $partner = User::where("type" , 1)->where("email" , $item)->first();
                if (!$partner) {
                    $partner = new User;
                    $partner->type = 1;
                    $partner->project_id = 0;
                    $partner->email = $item; // <- partner's email
                    $partner->name = $request->partner_name[$key];
                    $partner->phonenumber = $request->partner_phone[$key];
//                  $slug = Str::slug($request->client_name);
                    $partner->password = Hash::make('password');
                    $partner->save();
                    $partner->assign('client');
                }
                $clientPartner = new ClientPartner();
                $clientPartner->client_id = $client->id;
                $clientPartner->partner_id = $partner->id;
                $clientPartner->project_id = $projects->id;
                $clientPartner->project_number = $projects->project_number;
                $clientPartner->save();
            }
        }

      return redirect()->route('viewbrandproject.id',$brandName->slug.'#'.$projects->project_number)->with('message', "Project has been created successfully");
    }

    /**
     * @param $projtype
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function createProjectForm($projtype)
    {
        $packages = packages::where("is_active", 1)->get();
        $managers = User::whereIs('production manager','hod production')->where("is_active", 1)->where("is_deleted", 0)->get(); // TODO Imp Info. For Get Any User / Employee As Per Role Simply add-> whereIs('role name')
        $brandmanagers = User::whereIs('brand manager')->where("is_active", 1)->where("is_deleted", 0)->get();
        $supportpersons = User::whereIs('support')->where("is_active", 1)->where("is_deleted", 0)->get();
        $currencies = Currency::all();
        $industries = Industry::all();
        $countries = Country::all();
        $clients = User::where("type", 1)->get();
        $contentProjectTypesCreative = ContentProjectTypes::where('content','CREATIVE')->get();
        $contentProjectTypesAcademic = ContentProjectTypes::where('content','ACADEMIC')->get();
        $academicLevels = AcademicLevels::all();
        $numberOfWords = NumberOfWords::all();
        $referenceStyles = ReferenceStyles::all();


        $getAllBrandsRequest = new GetAllBrandsRequest();

        $allBrands = $getAllBrandsRequest->handle();
            //        ------ Common Items -------

        if ($projtype == 'content-creative') {

            return view('project.createcontentcreativeproject',['content_type_creative' => true , 'content_type_academic' => false])
                ->with(compact('packages', 'managers', 'brandmanagers', 'allBrands', 'clients', 'supportpersons', 'currencies', 'industries', 'contentProjectTypesCreative', 'academicLevels', 'numberOfWords', 'referenceStyles'));

        } elseif ($projtype == 'content-academic') {
            return view('project.createcontentcreativeproject',['content_type_creative' => false , 'content_type_academic' => true])
                ->with(compact('packages', 'managers', 'brandmanagers', 'allBrands', 'clients', 'supportpersons', 'currencies', 'industries', 'contentProjectTypesAcademic', 'academicLevels', 'numberOfWords', 'referenceStyles'));
        } elseif ($projtype == 'design') {

            return view('project.createdesignproject')
                ->with(compact('packages', 'managers', 'brandmanagers', 'allBrands', 'clients', 'supportpersons', 'currencies', 'industries'));

        } elseif ($projtype == 'development') {

            return view('project.createdevelopmentproject')
                ->with(compact('packages', 'managers', 'brandmanagers', 'allBrands', 'clients', 'supportpersons', 'currencies'));

        } elseif ($projtype == 'seo') {

            return view('project.createseoproject')
                ->with(compact('packages', 'managers', 'brandmanagers', 'allBrands', 'clients', 'supportpersons', 'currencies', 'countries'));

        } elseif ($projtype == 'others') {

            return view('project.createotherproject')
                ->with(compact('packages', 'managers', 'brandmanagers', 'allBrands', 'clients', 'supportpersons', 'currencies', 'industries'));

        } else {
            dd('error');
        }
    }




    /**
     * @param DevelopmentProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function development_project_submit(DevelopmentProjectRequest $request){
        $client = User::where("type" , 1)->where("email" , $request->client_email)->first();
        if (!$client) {
            // Create New Client if not exist
            $client = new User;
            $client->type = 1;
            $client->name = $request->client_name;
            $client->email = $request->client_email;
            $client->phonenumber = $request->client_phone;
            $slug = Str::slug($request->client_name);
            $client->password = Hash::make($slug);
            $client->save();
            $client->assign('client');
        }

        $user = Auth::user();

        $projects = new projects;
        $projects->name = $request->name;
        $projects->user_id = $user->emp_id; //Sales user Id change to emp_id
        $projects->client_id = $client->id;
        $projects->brand_id = $request->brands;
        $projects->source_account_id = $request->sourceaccount;
        $projects->project_category = 'DEVELOPMENT';
//        $projects->support_id = $request->supportperson; // support person
//        $projects->projownertype = $request->projownertype;
        $projects->project_package = serialize($request->project_package);
        $projects->client_name = $request->client_name;
        $projects->client_email = $request->client_email;
        $projects->manager_id = $request->project_manager;
        $projects->client_phone = $request->client_phone;
        $projects->currency_id = $request->currency;
        $projects->project_cost = $request->project_cost;
        $projects->paid_cost = $request->paid_cost;
        $projects->remaining_cost = $request->remain_cost;
        $projects->project_type = $request->project_type;
        $projects->project_priority = $request->project_priority;
        $projects->project_details = $request->project_details;
        $projects->deadline = date('Y-m-d',strtotime($request->due_date));
        $projects->url = $request->sample_url;

        $dt = date("dmY");
        $string = $this->str_random(8);
        $projects->project_number = "Dev-Project-".$string."-".$dt;
        $projects->save();



        // Create packages list for this project
//        foreach ($request->project_package as $key => $value) {
//            $project_package = new project_package;
//            $project_package->project_id = $projects->id;
//            $project_package->package_id = $value;
//            $project_package->save();
//        }

        // Create project attachment
        if (isset($request->attachment_path_id)){
            foreach ($request->attachment_path_id as $key => $value) {
                $project_attachment = new project_attachment;
                $project_attachment->project_id = $projects->id;
                $project_attachment->path = $value;

                $path_info = pathinfo($value);
                $imageExtentions = ['png', 'jpg','jpeg'];

                if(in_array($path_info['extension'], $imageExtentions)){
                    $project_attachment->attachment_type = 'image';
                }

                $project_attachment->save();
            }
        }
        $brandName = brand::find($request->brands);

        $project_trastran = new project_transition;

        $project_trastran->emp_id = $user->emp_id;
        $project_trastran->brand_id  = $brandName->id;
        $project_trastran->project_id = $projects->id;
        $project_trastran->transition_id = $request->trans_id;
        $project_trastran->total_cost = $request->project_cost;
        $project_trastran->paid_cost = $request->paid_cost;
        $project_trastran->remain_cost = $request->remain_cost;
        $project_trastran->save();

        if ($request->projownertype == "partner"){
            foreach ($request->partner_email as $key => $item){
                $partner = User::where("type" , 1)->where("email" , $item)->first();
                if (!$partner) {
                    $partner = new User;
                    $partner->type = 1;
                    $partner->project_id = 0;
                    $partner->email = $item; // <- partner's email
                    $partner->name = $request->partner_name[$key];
                    $partner->phonenumber = $request->partner_phone[$key];
//                  $slug = Str::slug($request->client_name);
                    $partner->password = Hash::make('password');
                    $partner->save();
                    $partner->assign('client');
                }
                $clientPartner = new ClientPartner();
                $clientPartner->client_id = $client->id;
                $clientPartner->partner_id = $partner->id;
                $clientPartner->project_id = $projects->id;
                $clientPartner->project_number = $projects->project_number;
                $clientPartner->save();
            }
        }

        $dev_proj = new DevelopmentProject();
        $dev_proj->order_id = $projects->project_number;
        $dev_proj->user_id = $user->emp_id;
        $dev_proj->project_id = $projects->id;
        $dev_proj->category = $request->category;
        $dev_proj->platform = $request->plateform;
        $dev_proj->theme_color = $request->theme_color;
        $dev_proj->development_type = $request->developmenttype;
//        $dev_proj->status	 = $projects->status;
//        $dev_proj->payment_status = $projects->payment_status;
        $dev_proj->save();


//        return redirect()->route('viewbrandproject.id',$brandName->slug.'#'.$projects->project_number)->with('message', "Project has been created successfully");

        $cateid = "Development".'#'.$projects->project_number;

        return redirect()->route('viewCategoryProjects.brandid.cateid',['brandid' => $brandName->slug,'cateid' => $cateid])->with('message', "Development Project has been created successfully");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function seo_project_submit(Request $request){

        $client = User::where("type" , 1)->where("email" , $request->client_email)->first();
        if (!$client) {
            // Create New Client if not exist
            $client = new User;
            $client->type = 1;
            $client->name = $request->client_name;
            $client->email = $request->client_email;
            $client->phonenumber = $request->client_phone;
            $slug = Str::slug($request->client_name);
            $client->password = Hash::make($slug);
            $client->save();
            $client->assign('client');
        }

        $user = Auth::user();

        $projects = new projects;
        $projects->name = $request->name;
        $projects->user_id = $user->emp_id; //Sales user Id change to emp_id
        $projects->client_id = $client->id;
        $projects->brand_id = $request->brands;
        $projects->source_account_id = $request->sourceaccount;
        $projects->project_category = 'SEO';
//        $projects->support_id = $request->supportperson; // support person
//        $projects->projownertype = $request->projownertype;
//        $projects->project_package = serialize($request->project_package);
        $projects->client_name = $request->client_name;
        $projects->client_email = $request->client_email;
        $projects->manager_id = $request->project_manager;
        $projects->client_phone = $request->client_phone;
        $projects->currency_id = $request->currency;
        $projects->project_cost = $request->project_cost;
        $projects->paid_cost = $request->paid_cost;
        $projects->remaining_cost = $request->remain_cost;
        $projects->project_type = $request->project_type;
        $projects->project_priority = $request->project_priority;
        $projects->project_details = $request->project_details;
        $projects->deadline = date('Y-m-d',strtotime($request->due_date));
        $projects->url = $request->sample_url;

        $dt = date("dmY");
        $string = $this->str_random(8);
        $projects->project_number = "Seo-Project-".$string."-".$dt;
        $projects->save();



        // Create packages list for this project
//        foreach ($request->project_package as $key => $value) {
//            $project_package = new project_package;
//            $project_package->project_id = $projects->id;
//            $project_package->package_id = $value;
//            $project_package->save();
//        }

        // Create project attachment
        if (isset($request->attachment_path_id)){
            foreach ($request->attachment_path_id as $key => $value) {
                $project_attachment = new project_attachment;
                $project_attachment->project_id = $projects->id;
                $project_attachment->path = $value;
                $path_info = pathinfo($value);
                $imageExtentions = ['png', 'jpg','jpeg'];

                if(in_array($path_info['extension'], $imageExtentions)){
                    $project_attachment->attachment_type = 'image';
                }
                $project_attachment->save();
            }
        }
        $brandName = brand::find($request->brands);

        $project_trastran = new project_transition;

        $project_trastran->emp_id = $user->emp_id;
        $project_trastran->brand_id  = $brandName->id;
        $project_trastran->project_id = $projects->id;
        $project_trastran->transition_id = $request->trans_id;
        $project_trastran->total_cost = $request->project_cost;
        $project_trastran->paid_cost = $request->paid_cost;
        $project_trastran->remain_cost = $request->remain_cost;
        $project_trastran->save();

        if ($request->projownertype == "partner"){
            foreach ($request->partner_email as $key => $item){
                $partner = User::where("type" , 1)->where("email" , $item)->first();
                if (!$partner) {
                    $partner = new User;
                    $partner->type = 1;
                    $partner->project_id = 0;
                    $partner->email = $item; // <- partner's email
                    $partner->name = $request->partner_name[$key];
                    $partner->phonenumber = $request->partner_phone[$key];
//                  $slug = Str::slug($request->client_name);
                    $partner->password = Hash::make('password');
                    $partner->save();
                    $partner->assign('client');
                }
                $clientPartner = new ClientPartner();
                $clientPartner->client_id = $client->id;
                $clientPartner->partner_id = $partner->id;
                $clientPartner->project_id = $projects->id;
                $clientPartner->project_number = $projects->project_number;
                $clientPartner->save();
            }
        }

        $seo_proj = new SeoProject();
        $seo_proj->order_id = $projects->project_number;
        $seo_proj->user_id = $user->emp_id;
        $seo_proj->project_id = $projects->id;

        $seo_proj->region_id = $request->target_region;
        $seo_proj->website = $request->website;
        $seo_proj->competitor_website = $request->competitor_website;
        $seo_proj->products_services_count = $request->products_services;
        $seo_proj->keywords = $request->keywords	;
//        $seo_proj->status	 = $projects->status;
//        $seo_proj->payment_status = $projects->payment_status;
        $seo_proj->save();

        $cateid = "seo".'#'.$projects->project_number;

        return redirect()->route('viewCategoryProjects.brandid.cateid',['brandid' => $brandName->slug,'cateid' => $cateid])->with('message', "Seo Project has been created successfully");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function design_project_submit(DesignProjectRequest $request){

        $client = User::where("type" , 1)->where("email" , $request->client_email)->first();
        if (!$client) {
            // Create New Client if not exist
            $client = new User;
            $client->type = 1;
            $client->name = $request->client_name;
            $client->email = $request->client_email;
            $client->phonenumber = $request->client_phone;
            $slug = Str::slug($request->client_name);
            $client->password = Hash::make($slug);
            $client->save();
            $client->assign('client');
        }

        $user = Auth::user();

        $projects = new projects;
        $projects->name = $request->name;
        $projects->user_id = $user->emp_id; //Sales user Id change to emp_id
        $projects->client_id = $client->id;
        $projects->brand_id = $request->brands;
        $projects->source_account_id = $request->sourceaccount;
        $projects->project_category = 'DESIGN';
//        $projects->support_id = $request->supportperson; // support person
//        $projects->projownertype = 'soleprop';
//        $projects->project_package = serialize($request->project_package);
        $projects->client_name = $request->client_name;
        $projects->client_email = $request->client_email;
        $projects->manager_id = $request->project_manager;
        $projects->client_phone = $request->client_phone;
        $projects->currency_id = $request->currency;
        $projects->project_cost = $request->project_cost;
        $projects->paid_cost = $request->paid_cost;
        $projects->remaining_cost = $request->remain_cost;
        $projects->project_type = $request->project_type;
        $projects->project_priority = $request->project_priority;
        $projects->project_details = $request->project_details;
        $projects->deadline = date('Y-m-d',strtotime($request->due_date));
        $projects->url = $request->website;

        $dt = date("dmY");
        $string = $this->str_random(8);
        $projects->project_number = "Design-Project-".$string."-".$dt;
        $projects->save();



        // Create packages list for this project
//        foreach ($request->project_package as $key => $value) {
//            $project_package = new project_package;
//            $project_package->project_id = $projects->id;
//            $project_package->package_id = $value;
//            $project_package->save();
//        }

        // Create project attachment
        if (isset($request->attachment_path_id)){
            foreach ($request->attachment_path_id as $key => $value) {
                $project_attachment = new project_attachment;
                $project_attachment->project_id = $projects->id;
                $project_attachment->path = $value;
                $path_info = pathinfo($value);
                $imageExtentions = ['png', 'jpg','jpeg'];

                if(in_array($path_info['extension'], $imageExtentions)){
                    $project_attachment->attachment_type = 'image';
                }
                $project_attachment->save();
            }
        }
        $brandName = brand::find($request->brands);

        $project_trastran = new project_transition;

        $project_trastran->emp_id = $user->emp_id;
        $project_trastran->brand_id  = $brandName->id;
        $project_trastran->project_id = $projects->id;
        $project_trastran->transition_id = $request->trans_id;
        $project_trastran->total_cost = $request->project_cost;
        $project_trastran->paid_cost = $request->paid_cost;
        $project_trastran->remain_cost = $request->remain_cost;
        $project_trastran->save();

        if ($request->projownertype == "partner"){
            foreach ($request->partner_email as $key => $item){
                $partner = User::where("type" , 1)->where("email" , $item)->first();
                if (!$partner) {
                    $partner = new User;
                    $partner->type = 1;
                    $partner->project_id = 0;
                    $partner->email = $item; // <- partner's email
                    $partner->name = $request->partner_name[$key];
                    $partner->phonenumber = $request->partner_phone[$key];
//                  $slug = Str::slug($request->client_name);
                    $partner->password = Hash::make('password');
                    $partner->save();
                    $partner->assign('client');
                }
                $clientPartner = new ClientPartner();
                $clientPartner->client_id = $client->id;
                $clientPartner->partner_id = $partner->id;
                $clientPartner->project_id = $projects->id;
                $clientPartner->project_number = $projects->project_number;
                $clientPartner->save();
            }
        }

        $design_proj = new DesignProject();
        $design_proj->order_id = $projects->project_number;
        $design_proj->user_id = $user->emp_id;
        $design_proj->project_id = $projects->id;

        $design_proj->industry_id = $request->industry_id;
        $design_proj->design_type = $request->design_type;
        $design_proj->company_name = $request->company_name;
        $design_proj->target_audience = $request->target_audience;
        $design_proj->slogan = $request->slogan;
        $design_proj->genre = $request->genre;
        $design_proj->where_to_use = $request->where_to_use;
        $design_proj->primary_color = $request->primary_color;
        $design_proj->secondary_color = $request->secondary_color;
//        $design_proj->status	 = $projects->status;
//        $design_proj->payment_status = $projects->payment_status;
        $design_proj->save();

        $cateid = "design".'#'.$projects->project_number;

        return redirect()->route('viewCategoryProjects.brandid.cateid',['brandid' => $brandName->slug,'cateid' => $cateid])->with('message', "Design Project has been created successfully");
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function other_project_submit(Request $request){


        $client = User::where("type" , 1)->where("email" , $request->client_email)->first();
        if (!$client) {
            // Create New Client if not exist
            $client = new User;
            $client->type = 1;
            $client->name = $request->client_name;
            $client->email = $request->client_email;
            $client->phonenumber = $request->client_phone;
            $slug = Str::slug($request->client_name);
            $client->password = Hash::make($slug);
            $client->save();
            $client->assign('client');
        }

        $user = Auth::user();

        $projects = new projects;
        $projects->name = $request->name;
        $projects->user_id = $user->emp_id; //Sales user Id change to emp_id
        $projects->client_id = $client->id;
        $projects->brand_id = $request->brands;
        $projects->source_account_id = $request->sourceaccount;
        $projects->project_category = 'OTHER';
//        $projects->support_id = $request->supportperson; // support person
//        $projects->projownertype = $request->projownertype;
//        $projects->project_package = serialize($request->project_package);
        $projects->client_name = $request->client_name;
        $projects->client_email = $request->client_email;
        $projects->manager_id = $request->project_manager;
        $projects->client_phone = $request->client_phone;
        $projects->currency_id = $request->currency;
        $projects->project_cost = $request->project_cost;
        $projects->paid_cost = $request->paid_cost;
        $projects->remaining_cost = $request->remain_cost;
        $projects->project_type = $request->project_type;
        $projects->project_priority = $request->project_priority;
        $projects->project_details = $request->project_details;
        $projects->deadline = date('Y-m-d',strtotime($request->due_date));
        $projects->url = $request->sample_url;

        $dt = date("dmY");
        $string = $this->str_random(8);
        $projects->project_number = "Other-Project-".$string."-".$dt;
        $projects->save();



        // Create packages list for this project
//        foreach ($request->project_package as $key => $value) {
//            $project_package = new project_package;
//            $project_package->project_id = $projects->id;
//            $project_package->package_id = $value;
//            $project_package->save();
//        }

        // Create project attachment
        if (isset($request->attachment_path_id)){
            foreach ($request->attachment_path_id as $key => $value) {
                $project_attachment = new project_attachment;
                $project_attachment->project_id = $projects->id;
                $project_attachment->path = $value;
                $path_info = pathinfo($value);
                $imageExtentions = ['png', 'jpg','jpeg'];

                if(in_array($path_info['extension'], $imageExtentions)){
                    $project_attachment->attachment_type = 'image';
                }
                $project_attachment->save();
            }
        }
        $brandName = brand::find($request->brands);

        $project_trastran = new project_transition;

        $project_trastran->emp_id = $user->emp_id;
        $project_trastran->brand_id  = $brandName->id;
        $project_trastran->project_id = $projects->id;
        $project_trastran->transition_id = $request->trans_id;
        $project_trastran->total_cost = $request->project_cost;
        $project_trastran->paid_cost = $request->paid_cost;
        $project_trastran->remain_cost = $request->remain_cost;
        $project_trastran->save();

        if ($request->projownertype == "partner"){
            foreach ($request->partner_email as $key => $item){
                $partner = User::where("type" , 1)->where("email" , $item)->first();
                if (!$partner) {
                    $partner = new User;
                    $partner->type = 1;
                    $partner->project_id = 0;
                    $partner->email = $item; // <- partner's email
                    $partner->name = $request->partner_name[$key];
                    $partner->phonenumber = $request->partner_phone[$key];
//                  $slug = Str::slug($request->client_name);
                    $partner->password = Hash::make('password');
                    $partner->save();
                    $partner->assign('client');
                }
                $clientPartner = new ClientPartner();
                $clientPartner->client_id = $client->id;
                $clientPartner->partner_id = $partner->id;
                $clientPartner->project_id = $projects->id;
                $clientPartner->project_number = $projects->project_number;
                $clientPartner->save();
            }
        }

        $oth_proj = new OtherProject();
        $oth_proj->order_id = $projects->project_number;
        $oth_proj->user_id = $user->emp_id;
        $oth_proj->project_id = $projects->id;

        $oth_proj->industry_id = $request->industry;
//        $oth_proj->status	 = $projects->status;
//        $oth_proj->payment_status = $projects->payment_status;
        $oth_proj->save();

        $cateid = "other".'#'.$projects->project_number;

        return redirect()->route('viewCategoryProjects.brandid.cateid',['brandid' => $brandName->slug,'cateid' => $cateid])->with('message', "Other Project has been created successfully");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function content_project_submit(Request $request){
        $client = User::where("type" , 1)->where("email" , $request->client_email)->first();
        if (!$client) {
            // Create New Client if not exist
            $client = new User;
            $client->type = 1;
            $client->name = $request->client_name;
            $client->email = $request->client_email;
            $client->phonenumber = $request->client_phone;
            $slug = Str::slug($request->client_name);
            $client->password = Hash::make($slug);
            $client->save();
            $client->assign('client');
        }

        $user = Auth::user();

        $projects = new projects;
        $projects->name = $request->name;
        $projects->user_id = $user->emp_id; //Sales user Id change to emp_id
        $projects->client_id = $client->id;
        $projects->brand_id = $request->brands;
        $projects->source_account_id = $request->sourceaccount;
        $projects->project_category = 'CONTENT';
//        $projects->support_id = $request->supportperson; // support person
//        $projects->projownertype = $request->projownertype;
//        $projects->project_package = serialize($request->project_package);
        $projects->client_name = $request->client_name;
        $projects->client_email = $request->client_email;
        $projects->manager_id = $request->project_manager;
        $projects->client_phone = $request->client_phone;
        $projects->currency_id = $request->currency;
        $projects->project_cost = $request->project_cost;
        $projects->paid_cost = $request->paid_cost;
        $projects->remaining_cost = $request->remain_cost;
        $projects->project_type = $request->project_type;
        $projects->project_priority = $request->project_priority;
        $projects->project_details = $request->project_details;
        $projects->deadline = date('Y-m-d',strtotime($request->due_date));
        $projects->url = $request->sample_url;

        $dt = date("dmY");
        $string = $this->str_random(8);
        $projects->project_number = "Content-".strtolower($request->content_type)."-Project-".$string."-".$dt;
        $projects->save();



        // Create packages list for this project
//        foreach ($request->project_package as $key => $value) {
//            $project_package = new project_package;
//            $project_package->project_id = $projects->id;
//            $project_package->package_id = $value;
//            $project_package->save();
//        }

        // Create project attachment
        if (isset($request->attachment_path_id)){
            foreach ($request->attachment_path_id as $key => $value) {
                $project_attachment = new project_attachment;
                $project_attachment->project_id = $projects->id;
                $project_attachment->path = $value;
                $path_info = pathinfo($value);
                $imageExtentions = ['png', 'jpg','jpeg'];

                if(in_array($path_info['extension'], $imageExtentions)){
                    $project_attachment->attachment_type = 'image';
                }
                $project_attachment->save();
            }
        }
        $brandName = brand::find($request->brands);

        $project_trastran = new project_transition;

        $project_trastran->emp_id = $user->emp_id;
        $project_trastran->brand_id  = $brandName->id;
        $project_trastran->project_id = $projects->id;
        $project_trastran->transition_id = $request->trans_id;
        $project_trastran->total_cost = $request->project_cost;
        $project_trastran->paid_cost = $request->paid_cost;
        $project_trastran->remain_cost = $request->remain_cost;
        $project_trastran->save();

        if ($request->projownertype == "partner"){
            foreach ($request->partner_email as $key => $item){
                $partner = User::where("type" , 1)->where("email" , $item)->first();
                if (!$partner) {
                    $partner = new User;
                    $partner->type = 1;
                    $partner->project_id = 0;
                    $partner->email = $item; // <- partner's email
                    $partner->name = $request->partner_name[$key];
                    $partner->phonenumber = $request->partner_phone[$key];
//                  $slug = Str::slug($request->client_name);
                    $partner->password = Hash::make('password');
                    $partner->save();
                    $partner->assign('client');
                }
                $clientPartner = new ClientPartner();
                $clientPartner->client_id = $client->id;
                $clientPartner->partner_id = $partner->id;
                $clientPartner->project_id = $projects->id;
                $clientPartner->project_number = $projects->project_number;
                $clientPartner->save();
            }
        }

        $content_proj = new ContentProject();
        $content_proj->order_id = $projects->project_number;
        $content_proj->user_id = $user->emp_id;
        $content_proj->project_id = $projects->id;

        $content_proj->reference_style_id = $request->referencingStyle;
        $content_proj->number_of_words_id = $request->numberOfWords;
        $content_proj->paper_topic = $request->paper_topic;
        $content_proj->paper_subject = $request->papersubject;
        $content_proj->number_of_slides = $request->noofslides;
        $content_proj->number_of_references = $request->noofRefrences;
        $content_proj->standard_of_work	 = $request->standardofwork;
        $content_proj->rephrasing_new = $request->rephrasing_new_type;
        $content_proj->content_type = $request->content_type;
        $content_proj->content_project_type = $request->contentProjectTypes;

        if ($request->content_type == 'CREATIVE'){
            $content_proj->industry_id = $request->industry;
            $content_proj->keywords = $request->keywords;
            $content_proj->website = $request->website;
        }else{
//            $content_proj->academic_level_id = $request->academic_level;
            $content_proj->academic_level_id = 2;
        }

//        $content_proj->status	 = $projects->status;
//        $content_proj->payment_status = $projects->payment_status;
        $content_proj->save();

        $cateid = "content".'#'.$projects->project_number;

        return redirect()->route('viewCategoryProjects.brandid.cateid',['brandid' => $brandName->slug,'cateid' => $cateid])->with('message', "Other Project has been created successfully");
    }

    public function getSourceAccountEmp(Request $request)
    {
//        $sourceAccountUsers = brandEmployee::with('brandAssigneeTo' ,'brandName') //for brand users
        $sourceAccountUsers = BrandSourceAccount::with('sourceAccountAssigneeTo' ,'brandName')
            ->where('brand_id', $request->project_sources_id)->get();
        $body = "<option value='' disabled selected>Please select any one</option>";
        if ($sourceAccountUsers) {
            foreach ($sourceAccountUsers as $key => $value) {

                $body .= "<option value='" . $value->sourceAccountAssigneeTo->id . "'>" . $value->sourceAccountAssigneeTo->name . "</option>"; // if this not working try below
//          $body[$key] = "<option value='".$value->brandAssigneeTo->id."'>".$value->brandAssigneeTo->name."</option>";  // Todo  Resolved
            }
            $bod['status'] = 1;
            $bod['body'] = $body;
        } else {
            $bod['status'] = 0;
            $bod['body'] = $bod;
        }

        $response = json_encode($bod);
        return $response;
    }


    public function projecttask_submit(Request $request)
    {
        $validation = $this->validate($request, [
            'title' => 'required',
            'due_date' => 'required',
            'file.*' => 'mimes:.png,.jpg,.jpeg,.pdf,.docx|max:10000',
        ]
        );
      $user = Auth::user();

      $project = projects::where("project_number" , $request->project_id)->where("is_active" ,1)->where("is_deleted" , 0)->first();
      if($project){
        $project_task = new project_task;
        $project_task->project_id = $request->project_id;
        $project_task->user_id = $user->emp_id;
        $project_task->title = $request->title;
        $project_task->dpt_to = $request->dpt_to;
        $project_task->due_date = date('Y-m-d' ,strtotime($request->due_date));
        //$project_task->assigned_to = $request->assigned_to; TODO  Why assigned_to is comment out?
        $project_task->task_priority = $request->task_priority;
        $project_task->details = $request->details;
        $project_task->task_label = $request->task_label;

        $dt = date("dmY");
        $string = $this->str_random(6);
        $project_task->task_number = "Task-".$string."-".$dt;
        $project_task->save();

        // Create project attachment
        if ($request->attachment_path_id) {
          foreach ($request->attachment_path_id as $key => $value) {
            $project_attachment = new project_attachment;
            $project_attachment->project_id = $project->id;
            $project_attachment->task_id = $project_task->id;
            $project_attachment->path = $value;
            $project_attachment->save();
          }
        }

        return redirect()->route('projecttask',$request->project_id)->with('message', "Project Task has been created successfully");
      }else{
        return redirect()->back()->with('error', "Project not found");
      }
    }

    public function project_attachment(Request $request)
    {
      $validation = $this->validate($request, [
            'file' => 'required',
            'file.*' => 'mimes:.png,.jpg,.jpeg,.pdf,.docx|max:10000',
          ], [
            'file.*' => 'Only accept png,jpg,jpeg,pdf,docx files, try again.',
            'file.required' => 'Files are required to upload.',
          ]
        );
      if (isset($_POST['request']) && $_POST['request'] == "delete") {
      }else{
        if($request->hasfile('file')){
            $file_name = $request->file('file')->getClientOriginalName();
            $file_name = substr($file_name, 0, strpos($file_name, "."));
            $ext = $request->file('file')->extension();
            $name = $file_name."_".time().'.'.$request->file('file')->extension();
            $request->file('file')->move(public_path().'/uploads/project_attachment/', $name);
            $data['filename'] = $name;
            $data['filepath'] = '/uploads/project_attachment/'. $name;
            $data['filetype'] = $ext;
            $b = json_encode($data);
            return $b;
        }
      }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewproject($brand_id)
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        $projects = projects::with('manager','support','supportPerson','client','packages','projectTasksProject','projectTasks.projectTaskLabel','brand')
            ->whereHas('brand', function (Builder $query) use ($brand_id) {
                $query->where('slug', $brand_id);
            });

        if ($userRole == "production manager"){
            $projects = $projects->where('manager_id' ,$user->emp_id);
        }

//        if ($userRole == "sales"){
//            $projects = $projects->whereHas('support', function (Builder $query) use ($user) {
//            $query->where('email', $user->email);
//            });
//        }
//        if ($userRole == "support"){
//            $projects = $projects->whereHas('supportPerson', function (Builder $query) use ($user) {
//            $query->where('email', $user->email);
//            });
//        }

        if ($userRole == "client"){
            $projects = $projects->where('client_email' ,$user->email);
        }

        if ($userRole == "team lead"){
            $projects = $projects->whereHas('projectTasks', function (Builder $query) use ($user) {
                $query->where('dpt_to', $user->emp_id);
            });
        }

        if ($userRole == "developer"){
            $projects = $projects->whereHas('projectTasks.projectTaskLabel', function (Builder $query) use ($user) {
                $query->where('type', 1)->where('title', $user->emp_id);
            });
        }

        $projects = $projects->where("is_active" , 1)->where("is_deleted" , 0)->get();

        $compelettasks=[];
        foreach ($projects as $project){
            foreach ($project->projectTasks as $projectTask){
                if ($projectTask->status != 'None'){
                    $compelettasks[] = $projectTask;
                }
            }

        }
        return view('project/projects')->with(compact('projects' , 'compelettasks'));
    }


    /**
     * @param $brand_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allProjectsView()
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        $projects = projects::with('manager','support','supportPerson','assign_project_to_user','client','packages','projectTasksProject','projectTasks.projectTaskLabel','brand');
//        if ($userRole == "production manager"){
//            $projects = $projects->where('manager_id' ,$user->emp_id);
//        }

//        if ($userRole == "sales"){
//            $projects = $projects->whereHas('support', function (Builder $query) use ($user) {
//            $query->where('email', $user->email);
//            });
//        }
//        if ($userRole == "support"){
//            $projects = $projects->whereHas('supportPerson', function (Builder $query) use ($user) {
//            $query->where('email', $user->email);
//            });
//        }

        if ($userRole == "client"){
            $projects = $projects->where('client_email' ,$user->email);
        }

        if ($userRole == "team lead"){
            $projects = $projects->where('assign_project_to' ,$user->emp_id)
                ->orWhereHas('projectTasks', function (Builder $query) use ($user) {
                $query->where('dpt_to', $user->emp_id);
            });
//            $projects = $projects->whereHas('projectTasks', function (Builder $query) use ($user) {
//                $query->where('dpt_to', $user->emp_id);
//            });
        }

        if ($userRole == "developer"){
            $projects = $projects->where('assign_project_to' ,$user->emp_id)
                ->orWhereHas('projectTasks.projectTaskLabel', function (Builder $query) use ($user) {
                $query->where('type', 1)->where('title', $user->emp_id);
            });
//            $projects = $projects->whereHas('projectTasks.projectTaskLabel', function (Builder $query) use ($user) {
//                $query->where('type', 1)->where('title', $user->emp_id);
//            });
        }

        $projects = $projects->where("is_active" , 1)->where("is_deleted" , 0)->orderBy('id','DESC')->get();

        $compelettasks=[];
        foreach ($projects as $project){
            foreach ($project->projectTasks as $projectTask){
                if ($projectTask->status != 'None'){
                    $compelettasks[] = $projectTask;
                }
            }

        }
        return view('project/projects')->with(compact('projects' , 'compelettasks'));
    }


    /**
     * @param $brand_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewProjectCategories($brand_id,$source_id = null){
        return view('project.project-categories', ['brand_id' => $brand_id , 'source_id' => $source_id ]);
    }
    public function viewCategoryProjects($brand_id , $cate_id ,$source_id = null){
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        if($source_id == null){
            $projects = projects::with('manager','support','supportPerson','client','packages','projectTasksProject','projectTasks.projectTaskLabel','brand','sourceaccount')
                ->where('project_category' ,strtoupper($cate_id))
                ->whereHas('brand', function (Builder $query) use ($brand_id) {
                    $query->where('slug', $brand_id);
                });
        }else{
            $projects = projects::with('manager','support','supportPerson','client','packages','projectTasksProject','projectTasks.projectTaskLabel','brand','sourceaccount')
                ->where('project_category' ,strtoupper($cate_id))
                ->where('source_account_id' ,$source_id )
                ->whereHas('brand', function (Builder $query) use ($brand_id) {
                    $query->where('slug', $brand_id);
                });
        }

        if ($userRole == "production manager"){
            $projects = $projects->where('manager_id' ,$user->emp_id);
        }

//        if ($userRole == "sales"){
//            $projects = $projects->whereHas('support', function (Builder $query) use ($user) {
//            $query->where('email', $user->email);
//            });
//        }
//        if ($userRole == "support"){
//            $projects = $projects->whereHas('supportPerson', function (Builder $query) use ($user) {
//            $query->where('email', $user->email);
//            });
//        }

        if ($userRole == "client"){
            $projects = $projects->where('client_email' ,$user->email);
        }

        if ($userRole == "team lead"){
            $projects = $projects->whereHas('projectTasks', function (Builder $query) use ($user) {
                $query->where('dpt_to', $user->emp_id);
            });
        }

        if ($userRole == "developer"){
            $projects = $projects->whereHas('projectTasks.projectTaskLabel', function (Builder $query) use ($user) {
                $query->where('type', 1)->where('title', $user->emp_id);
            });
        }

        $projects = $projects->where("is_active" , 1)->where("is_deleted" , 0)->orderBy('id','DESC')->get();

        $compelettasks=[];
        foreach ($projects as $project){
            foreach ($project->projectTasks as $projectTask){
                if ($projectTask->status != 'None'){
                    $compelettasks[] = $projectTask;
                }
            }

        }

        return view('project/projects')->with(compact('projects' , 'compelettasks'));

    }


    public function viewProjectCreate(){
        return view('project.view-create-project-categories');
    }
    /**
     * @param $project_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function projectDetailById($project_id)
    {
        $project = projects::with(
            'devproject', 'contentproject.industryById', 'contentproject.referenceStyleById', 'contentproject.numberOfWordsById', 'contentproject.academicLevelById','contentproject.contentProjectType', 'designproject.industryById','seoproject.regionById', 'otherproject.industryById','manager', 'support','client','packages', 'projectTasksProject','projectTasks.projectTaskLabel', 'brand')
            ->where('project_number',$project_id)->first();
        $project_tasks = project_task::where("project_id" , $project_id)->get();

        return view('project.projectdetails', ['project' => $project , 'project_tasks' => $project_tasks]);
    }

    /**
     * @param $task_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function projectTaskAttachments($task_id)
    {
        $taskinfo = project_task::where('id',$task_id)->first();

        $taskattachments = project_attachment::where('task_id',$task_id)->get();

        return view('project.taskattachments', ['taskattachments' => $taskattachments , 'taskinfo' => $taskinfo]);
    }

    /**
     * @param $project_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function projectAttachments($project_id)
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        $projectinfo = projects::where('id',$project_id)->first();

        $projectattachments = project_attachment::where('project_id',$project_id)->where('task_id',null)->get();

        $projecttaskattachments = project_attachment::where('project_id',$project_id)->where('task_id','!=',null)->get();

        $projectfinalattachments = project_attachment::where('project_id',$project_id)->whereNull('task_id')->where('is_final',1)->get();

        return view('project.projectattachments', ['userRole' => $userRole ,'projectattachments' => $projectattachments ,'projecttaskattachments' => $projecttaskattachments , 'projectinfo' => $projectinfo, 'projectfinalattachments' => $projectfinalattachments]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function projectFinalFileStatus(Request $request) {
        $projectfile = project_attachment::find($request->modal_file_id);
        $projectfile->status = $request->file_status ;
        $projectfile->last_status_update_by = auth()->id();
        $projectfile->save();
        return back()->with('success', 'Project Final File Status Uploaded successfully!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upLoadProjectFinalFile(Request $request) {

        if($request->has('attachment_description') || $request->has('attachment_title')){
            $project_attachment =  project_attachment::findorfail($request->attachment_id);
            if($request->has('attachment_description')){
                $project_attachment->attachment_description = $request->attachment_description;
            }
            if($request->has('attachment_title')){
                $project_attachment->attachment_title = $request->attachment_title;
            }
            $project_attachment->save();
            return back();
        }

        if ($request->hasFile('deliveryfiles')){
            foreach ($request->file('deliveryfiles') as $file){

                $projectdevliryfile = new project_attachment();
                $mimeType = $file->getClientmimeType();
                $fileType = substr($mimeType, 0, strpos($mimeType, "/"));
                $fileName = substr($file->getClientOriginalName(), 0, strpos($file->getClientOriginalName(), "."));


                $path = $file->store('projectdeliveryfiles');
                $projectdevliryfile->path = '/storage/'.$path;
                $projectdevliryfile->attachment_type = $fileType;
                $projectdevliryfile->attachment_name = $fileName;

                $projectdevliryfile->project_id  = $request->project_id;
                $projectdevliryfile->task_id  = null;
                $projectdevliryfile->is_final  = 1;
                $projectdevliryfile->save();
            }
        }
        return back();

    }

    public function projectscope($id)
    {
        return view('project/project-scope');
    }

    public function projecttask($id)
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        $projectinfo = projects::with('manager')
            ->where('project_number',$id)->first();

        if (!isset($projectinfo)){
            return redirect()->route('home')->with('error', 'Item Not Found!');
        }
        $project_task = project_task::where("project_id" , $id);

        if ($userRole == "team lead"){
            $project_task = $project_task->where('dpt_to' ,$user->emp_id);
        }
        if ($userRole == "developer") {
            $project_task = $project_task->with('projectTaskLabelByTaskid')
                ->whereHas('projectTaskLabelByTaskid', function (Builder $query) use ($user) {
                    $query->where('type', 1)->where('title', $user->emp_id);
                })
                ->orWhere("dpt_to", $user->emp_id);
        }

        $project_task = $project_task->where("is_active" , 1)->orWhere("user_id" , $user->emp_id)->where("is_deleted" , 0)->get();

        return view('project/project-task')->with(compact('project_task','id' ,'projectinfo' ));
    }

    public function createtask($id)
    {
      $packages = packages::where("is_active" ,1)->get();
//      $allow_role = array('2','3');
//      $dpt_user = User::whereIn("role_id" , $allow_role)->where("is_active" ,1)->where('is_deleted' , 0)->get();
//      $dpt_emp = User::where("role_id" , '4')->where("is_active" ,1)->where('is_deleted' , 0)->get();
        $dpt_user = User::where("type" ,2)->where("is_active" ,1)->where('is_deleted' , 0)->get();
      return view('project/createtask')->with(compact('packages','id','dpt_user'));
    }

    public function editTask($id)
    {
        $project_task = project_task::find($id);
        $project_attachment = project_attachment::where('task_id', $id)->get()->toArray();
        // for attachments start
        $tableImages = [];

        foreach ($project_attachment as $attachment) {
            $filename = pathinfo(url($attachment['path']))['basename'];
            $tableImages[] = $filename;
        }

        $storeFolder = public_path('uploads/project_attachment');
        $file_path = public_path('uploads/project_attachment/');

        $files = scandir($storeFolder);

        $data = [];

        foreach ($files as $file) {

            if ($file != '.' && $file != '..' && in_array($file, $tableImages)) {
                $obj['name'] = $file;
                $file_path = public_path('uploads/project_attachment/') . $file;
                $obj['size'] = filesize($file_path);
                $obj['path'] = url('public/uploads/project_attachment/' . $file);
                $data[] = $obj;
            }

        }
        $project_attachment_data = json_encode($data);

        // for attachments end

        $packages = packages::where("is_active", 1)->get();

        $dpt_user = User::whereIs('team lead','developer')->where("type", 2)->where("is_active", 1)->where('is_deleted', 0)->get();
        return view('project/edittask')->with(compact('packages', 'id', 'dpt_user', 'project_task', 'project_attachment', 'project_attachment_data'));
    }

    public function projectTaskUpdate(Request $request)
    {

        $validation = $this->validate($request, [
                'title' => 'required',
                'due_date' => 'required',
                'file.*' => 'mimes:.png,.jpg,.jpeg,.pdf,.docx|max:10000',
            ]
        );
        $user = Auth::user();
        $project = projects::where("project_number" , $request->project_id)->where("is_active" ,1)->where("is_deleted" , 0)->first();
        if($project){
            $project_task = project_task::find($request->id);
            $project_task->project_id = $request->project_id;
//            $project_task->user_id = $user->emp_id;
            $project_task->title = $request->title;
            $project_task->dpt_to = $request->dpt_to;
            $project_task->due_date = date('Y-m-d', strtotime($request->due_date));
            //$project_task->assigned_to = $request->assigned_to;
            $project_task->task_priority = $request->task_priority;
            $project_task->details = $request->details;
            //for task info update track
            $project_task->update_by = $user->emp_id;
            $project_task->task_updated_at = date('Y-m-d h:i:s');

            $project_task->save();

            // Update project attachments  TODO Attachment update Done
            $oldattatchmentspaths = project_attachment::where('task_id', $request->id)->pluck('path')->toArray(); // Select uploaded attachments.

            $modifyattachpath = []; // modify attachments path to base name .

            foreach ($oldattatchmentspaths as $attachkey => $attachitem) {
                $modifyattachpath[$attachkey] = pathinfo(url($attachitem))['basename'];
            }

            if ($request->attachment_path_id) {
                foreach ($request->attachment_path_id as $key => $value) {
                    $itembasename = pathinfo(url($value))['basename'];

//                    dd($value, $itembasename, $modifyattachpath, !in_array($itembasename, $modifyattachpath));
                    if (!in_array($itembasename, $modifyattachpath)) {
                        $project_attachment = new project_attachment;
                        $project_attachment->project_id = $project->id;
                        $project_attachment->task_id = $project_task->id;
                        $project_attachment->path = '/uploads/project_attachment/' . $itembasename;
                        $project_attachment->save();
                    }
                }
            }

            return redirect()->route('projecttask', $request->project_id)->with('message', "Project Task has been Update successfully");
        }else{
            return redirect()->back()->with('error', "Project not found");
        }
    }

    public function projTaskBar( Request $request)
    {
        $projectTask = project_task::where('task_number',$request->taskid)->first();

        if (!isset($projectTask)){
            return redirect()->back()->with('error', 'Task Not Found !!');
        }

        $projectTask->progress = $request->progvalue ;

        $projectTask->save();
        return redirect()->back()->with('message', 'Task Progress Update Success');

    }

    public function get_emp()
    {
        $user = User::where("emp_id" ,(int) $_POST['emp_id'])->first();

      $body = "<option value='' disabled selected>Please select any one</option>";
      if ($user) {
        $all_users = User::where("reporting_line" , $user->email)->where("is_active" ,1)->where('is_deleted' , 0)->get();
            // dd($all_users);
        foreach ($all_users as $key => $value) {
          $body .= "<option value='".$value->emp_id."'>".$value->name."</option>"; // if this not working try below
//          $body[$key] = "<option value='".$value->emp_id."'>".$value->name."</option>";  // Todo  Resolved
        }
        $bod['status'] = 1;
        $bod['body'] = $body;
      }else{
        $bod['status'] = 0;
        $bod['body'] = $bod;
      }

      $response = json_encode($bod);
      return $response;
    }

    // Modal Form Submit
    public function task_form_submit()
    {
      $project = projects::where("project_number" ,$_POST['project_id'])->where("is_active" ,1)->where("status" , 'Completed')->first();
      if ($project) {
        $bod['status'] = 0;
        $bod['msg'] = "Can't update those record that have been Completed.";
      }

    //   $task = project_task::find($_POST['task_id']);
      $task = project_task::where('task_number',$_POST['task_id'])->first();



      $user = Auth::user();
      if ($_POST['is_update'] != 0 && $_POST['task_type'] != 3) {
        $project_task_label = project_task_label::find($_POST['is_update']);
        $project_task_label->title = $_POST['val'];
        $project_task_label->save();
        $bod['status'] = 1;
        $bod['msg'] = "Updated.";
        $bod['body'] = $_POST['val'];
      }elseif ($_POST['is_update'] == 0 && $_POST['task_type'] != 3) {
        $project_task_label = new project_task_label;
        $project_task_label->project_id = $_POST['project_id'];
        $project_task_label->user_id = $user->emp_id;
        $project_task_label->task_number = $_POST['task_id'];
        $project_task_label->type = $_POST['task_type'];
        $project_task_label->title = $_POST['val'];
        $project_task_label->save();
        $bod['status'] = 1;
        $bod['msg'] = "Created.";
        $bod['body'] = $_POST['val'];
      }elseif ($_POST['is_update'] != 0 && $_POST['task_type'] == 3) {
        $task = project_task::find($_POST['is_update']);
        $task->due_date = date('Y-m-d' , strtotime($_POST['val']));
        $task->save();
        $bod['status'] = 1;
        $bod['msg'] = "Due Date Updated.";
        $bod['body'] = $_POST['val'];
      }else{

      }

      $response = json_encode($bod);
      return $response;
    }

    private function str_random($length = 16)
    {
        return Str::random($length);
    }

    public function myTaskslist()
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();
        if ($userRole == "developer"){
            
            $project_task = project_task::whereHas('projectTaskLabelByTaskid', function ($q) use ($user) {
                $q->where("title", $user->emp_id)
                ->where("type" , 1)
                ->where("is_active" , 1)
                ->where("is_deleted" , 0);
                })
                ->orWhere('dpt_to',$user->emp_id)
                ->get();

        }elseif ($userRole == "production manager") {
            $project_task = projects::with('projectTasks')->where('manager_id',$user->emp_id)->get();
        }elseif ($userRole == "team lead") {
            $project_task = project_task::where('dpt_to',$user->emp_id)->get();
        }else{
//            $project_task = null;
            $project_task = project_task::with('assign_under')->orderBy('id','DESC')->get();
        }

        return view('mytask.index', ['tasks' => $project_task]);
    }

    public function projectAndTaskStatusUpdate($id, $ptid)
    {
        if ($id == 1 || $id == 2) {
            $project = projects::where('project_number', $ptid)->where("is_active", 1)->where('is_deleted', 0)->first();
            if ($id == 1) {
                $project->status = 'Completed';
                $project->save();
            } elseif ($id == 2) {
                $project->status = 'Closed';
                $project->save();
            }
            return redirect()->back()->with('message', 'Project Status Updated');
        } elseif ($id == 3 || $id == 4) {
            $projectTask = project_task::where('task_number', $ptid)->where("is_active", 1)->where('is_deleted', 0)->first();
            if ($id == 3) {
                $projectTask->status = 'Completed';
                $projectTask->progress = 100;
                $projectTask->save();
            } elseif ($id == 4) {
                $projectTask->status = 'Closed';
                $projectTask->progress = 100;
                $projectTask->save();
            }
            return redirect()->back()->with('message', 'Project Task Status Updated');
        } else {
            return redirect()->back()->with('error', 'Invalid Request');
        }

    }

    /**
     * @param $project_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function projectChat($project_id)
    {
        $project = projects::with('manager','support','client')->where('project_number', $project_id)->first();
        $project_thread = project_thread::where('project_id', $project_id)->get();

        return view('projectchat.index', ['project' => $project , 'project_thread' => $project_thread]);
    }

    public function create_project_thread()
    {

      $user = Auth::user();
      $project_thread = new project_thread;
      $project_thread->project_id = $_POST['project_id'];
      $project_thread->title = $_POST['title'];
      $project_thread->created_by = $user->emp_id;
      $project_thread->save();

      $body['created_month'] = date("D M" , strtotime($project_thread->created_at));
      $body['created_time'] = date('h:i a', strtotime($project_thread->created_at));
      $body['project_id'] = $_POST['project_id'];
      $body['created_by'] = $user->username;
      $body['title'] = $_POST['title'];
      $body['status'] = 1;

      $response = json_encode($body);
      return $response;
    }

    public function projectBrandList()
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        if ($userRole != "admin" && $userRole != "hod sales and support") {
            $brands = brandEmployee::with('brandName.brandSalesPerson','brandName.brandProjects')->where('employee_id', $user->emp_id)->get();
        } else {
            $brands = brand::with('brandSalesPerson' , 'brandProjects')->get();
        }

        return view('project.brandproject', ['brands' => $brands]);
    }

    /**
     * @param $brand_id
     */
    public function viewBrandSourceAccountProject($brand_id)
    {
//        $brandEmployees = brandEmployee::with('brandAssigneeTo','brandName')->where('brand_id',$brand_id)->get();
        $brandEmployees = BrandSourceAccount::with('sourceAccountAssigneeTo' ,'brandName')->where('brand_id',$brand_id)->get();
        $user = Auth::user();
        return view('project.brandsourceaccount', ['brandEmployees' => $brandEmployees ,'user' => $user]);
    }

    public function projectDelete($project_id)
    {

        projects::where('project_number',$project_id)->delete();
        project_task::where('project_id',$project_id)->delete();
        project_task_label::where('project_id',$project_id)->delete();

        return redirect()->route('viewbrandproject')->with('message', 'Project and Related Items Deleted Successfully');

    }


    public function projectTransitionHistoryById($project_id)
    {
        $project = projects::with('manager','support','client','packages','projectTasksProject','projectTasks.projectTaskLabel','brand')
            ->where('project_number',$project_id)->first();

        if (!isset($project)){
            return redirect()->route('viewbrandproject')->with('error' , 'Project Not Found!');
        }

        $project_transitions = project_transition::with('empinfo', 'packagename')
            ->where('project_id' ,$project->id)
//            ->where('package_id' ,0)
//            ->whereNull('parent_id')
            ->get();

//        $project_upsale_transitions = project_transition::with('empinfo', 'packagename')
//            ->where('project_id' ,$project->id)
//            ->where('package_id' ,'!=',0)
//            ->orWhereNull ('package_id')
//            ->WhereNull ('parent_id')
//            ->get();

//        $project_upsale_inner_trans = project_transition::with('empinfo', 'packagename')
//            ->where('project_id' ,$project->id)
//            ->whereNull('package_id')
//            ->whereNull('parent_id')
//            ->get();

//        return view('project.projecttransition', ['project' => $project ,'project_transitions' => $project_transitions,'project_upsale_transitions' => $project_upsale_transitions]);
        return view('project.projecttransition', ['project' => $project ,'project_transitions' => $project_transitions]);
    }

    public function createProjectTransitionHistory($project_id)
    {
        $project = projects::with('brand')->where('project_number' ,$project_id)->first();

        $project_transitions = project_transition::with('empinfo')->where('project_id' ,$project->id)->orderBy('id','desc')->first();

        $projectpackages = packages::where("is_active" ,1)->where("is_deleted" ,0)->get();

        $route = url('submit-project-transition-history');

        return view('project.projecttransitionform', ['project' => $project, 'projectpackages' => $projectpackages ,'project_transitions' => $project_transitions , 'route' => $route, 'edit' => false]);
    }


    /**
     * @param CreateProjectTransition $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitProjectTransitionHistory(CreateProjectTransition $request)
    {
        $response = $request->handle();
        if (!$response){
            return redirect()->back()->with('error', 'Project Transition Create Failed Please UnSelect Complete Project In Order To Create New Transition');
        }
        return redirect()->route('projecttransitionhistory.id', $request->projectnum)->with('message', 'Project Transition Create Successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchProjectsAndTasks(Request $request)
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

       $projects  = projects::with('manager','support','supportPerson','client','packages','projectTasksProject','projectTasks.projectTaskLabel','brand')
           ->orWhere('name', 'like','%' . $request->searchkeyword . '%' )
           ->orWhere('project_number', 'like','%' . $request->searchkeyword . '%' );

        if ($userRole == "production manager"){
            $projects = $projects->where('manager_id' ,$user->emp_id);
        }

        if ($userRole == "sales"){
            $projects = $projects->whereHas('support', function (Builder $query) use ($user) {
                $query->where('email', $user->email);
            });
        }
//        if ($userRole == "support"){
//            $projects = $projects->whereHas('supportPerson', function (Builder $query) use ($user) {
//                $query->where('email', $user->email);
//            });
//        }

        if ($userRole == "client"){
            $projects = $projects->where('client_email' ,$user->email);
        }

        if ($userRole == "team lead"){
            $projects = $projects->whereHas('projectTasks', function (Builder $query) use ($user) {
                $query->where('dpt_to', $user->emp_id);
            });
        }

        if ($userRole == "developer"){
            $projects = $projects->whereHas('projectTasks.projectTaskLabel', function (Builder $query) use ($user) {
                $query->where('type', 1)->where('title', $user->emp_id);
            });
        }
        $projects = $projects->where("is_active" , 1)->where("is_deleted" , 0)->get();
        // --------

        if ($userRole == "developer") {
            $projecttasks = project_task_label::with('taskInfo')
                ->where("type", 1)
                ->where("title", $user->emp_id)
                ->whereHas('taskInfo', function (Builder $query) use ($request) {
                    $query->orWhere('title', 'like', '%' . $request->searchkeyword . '%')
                          ->orWhere('task_number', 'like', '%' . $request->searchkeyword . '%');
                })
                ->where("is_active", 1)
                ->where("is_deleted", 0);
        }elseif ($userRole == "production manager") {
            $projecttasks = projects::with('projectTasks')->where('manager_id',$user->emp_id)->get();
        }elseif ($userRole == "team lead") {
            $projecttasks = project_task::where('dpt_to',$user->emp_id)->get();
        }elseif ($userRole == "admin") {
            $projecttasks  = project_task::orWhere('title', 'like','%' . $request->searchkeyword . '%' )
           ->orWhere('task_number', 'like','%' . $request->searchkeyword . '%' )->get();;
        }else{
            $projecttasks = null;
        }

        return view('project.searchprojectntask', ['projects' => $projects ,'projecttasks' => $projecttasks]);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function getProjectTaskProgress(Request $request)
    {
        $user = Auth::user();
        $taskmessagesbody = "";
        $projecttask  = project_task::where('task_number',$request->task_id)->first();

        $taskmessages = TasksComment::where('task_id',$request->task_id)->get();

        if ($taskmessages) {
            foreach ($taskmessages as $key => $value) {

                if ($value->emp_id == $user->emp_id) {
                    $taskmessagesbody .= "<div class='media right-side-chat'><p class='f-w-400'>" . $value->created_at->diffForHumans() . "</p><div class='media-body text-end'><div class='message-main pull-right'><span class='mb-0 text-start'>" . $value->message . "</span><div class='clearfix'></div><p class='f-w-400' style='margin-top: 8px !important;'>" . $value->messageby->name . "</p></div></div></div>";
                } else {
                    if (isset($value->messageby->profile_pic)) {
                        $img = asset($value->messageby->profile_pic);
                    } else {
                        $img = asset('images/user.jpg');
                    }

                    $taskmessagesbody .= "<div class='media left-side-chat'><div class='media-body d-flex'><div class='img-profile'><img class='img-fluid' src='" . $img . "' alt='Profile' /></div><div class='main-chat'><div class='message-main'><span class='mb-0'>" . $value->message . "</span></div><p class='f-w-400' style='margin-top: 8px !important;'>" . $value->messageby->name . "</p></div></div><p class='f-w-400'>" . $value->created_at->diffForHumans() . "</p></div>";
                }
            }
        }

        $response['progressvalue'] = $projecttask->progress ;
        $response['taskmessages']=$taskmessagesbody;

        return json_encode($response);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function submitProjectTaskProgressChat(Request $request)
    {
        $user = Auth::user();
        $taskmessagesbody = "";
        $taskmessages = new TasksComment();

        $taskmessages->emp_id = $user->emp_id;
        $taskmessages->task_id = $request->task_id;
        $taskmessages->message = $request->post_message;

        $taskmessages->save();

        $taskmessagesbody .="<div class='media right-side-chat'><p class='f-w-400'>".$taskmessages->created_at->diffForHumans()."</p><div class='media-body text-end'><div class='message-main pull-right'><span class='mb-0 text-start'>".$taskmessages->message."</span><div class='clearfix'></div><p class='f-w-400' style='margin-top: 8px !important;'>".$taskmessages->messageby->name."</p></div></div></div>";

        $response['taskmessages']=$taskmessagesbody;

        return json_encode($response);
    }


    /**
     * @param Request $request
     * @return bool
     */
    public function submitProjectReview(Request $request)
    {
        $user = Auth::user();

        $projectreview = new ProjectReviews();
        $projectreview->project_number = $request->project_id;
        $projectreview->emp_id = $user->emp_id;
        $projectreview->message = $request->post_message;
        $projectreview->save();

        return redirect()->back()->with('message','Review Submit Successfully !');
    }

    /**
     * @param $project_num
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function projectReview($project_num)
    {
        $user = Auth::user();

        $projectinfo = projects::where('project_number',$project_num)->first();

        $projectreviews = ProjectReviews::with('employeesByID')->where('project_number',$project_num)->get();

        $checkreview = ProjectReviews::where('emp_id',$user->emp_id)->where('project_number',$project_num)->first();
         if (isset($checkreview)){
             $addreview = false;
         } else{
             $addreview = true;
         }

        return view('project.projectreviews', ['projectinfo' => $projectinfo ,'projectreviews' => $projectreviews,'addreview' => $addreview]);

    }


    public function sentPNotify(){
        event(new MessageNotification('this is test notification !!'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function assigneeProject($id){

        $projectInfo = projects::find($id);

        $route = route('submitAssigneeProject');

        $employees = user::with('emp_department')
            ->whereIs('team lead' ,'developer')
            ->where('type',2)->where('id','!=',1)->get();

        return view('project.assignproject', ['projectInfo' => $projectInfo, 'employees' => $employees, 'route' => $route, 'edit' => false]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitAssigneeProject(Request $request){

        $project = projects::find($request->project_id);
        $project->assign_project_to = $request->employee;
        $project->save();

        return redirect()->route('allProjectsView','#'.$project->project_number)->with('message', 'Project Assignee Successfully');

    }


}

