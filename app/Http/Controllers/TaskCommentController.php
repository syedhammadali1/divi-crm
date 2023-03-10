<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\chat; 
use App\Models\project_task_comment; 
use App\Model\groups; 
use App\Model\group_user; 
use App\Model\block_connection; 
use App\Models\project_task; 
use App\Models\projects; 
use App\Models\notifications; 
use Auth;
use Crypt;

class TaskCommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
   public function chat(){

    $id = Auth::user()->id;
    $all_members = User::where("is_active" , 1)->where('id' ,'!=' , 1)->get();
    return view('chat/chat')->with(compact('all_members'));
    
    $data['info']=User::find($id);

    // $block_connection = block_connection::where("user_id" , $id)->where("is_active" , 1)->get()->pluck("requested_userid")->toArray();

    // if($ids==0){
    //     $data['all_users']=User::where('id','!=',$id)->whereNotIn("id" , $block_connection)->get();
    // }else{

    // $data['all_users']=User::where('is_active',1)->whereNotIn("id" , $block_connection)->where('id',$ids)->get();
    // }

    //$groups = groups::where("is_active" ,1 )->where("user_id" , $id)->get();
    //$all_members = User::where('is_active',1)->whereNotIn("id" , $block_connection)->where("id" ,"!=", $id)->get();
    $groups = [];
    $all_members = User::where("is_active" , 1)->get();
    return view('web/chat',$data)->with(compact('groups','all_members'));
    }

    public function chatroom($group_id){
        
    $user = Auth::user();
    if ($group_id == "") {
        return redirect()->back()->with('error','Invalid URL');
    }
    $group_id = Crypt::decryptString($group_id);
    $group = groups::where('is_active',1)->where("id" ,$group_id)->first();
    if (!$group) {
        return redirect()->back()->with('error','No Group Found');
    }
    $group_user = group_user::where("is_active" ,1)->where("user_id" , $user->id)->where("group_id" ,$group->id)->first();
    if (!$group_user) {
        return redirect()->back()->with('error','You are not a User of this group.');
    }
    $chat = chat::where("is_active" ,1)->where("group_id" , $group_id)->get();
    $group_user = group_user::where("is_active" ,1)->where("group_id" ,$group->id)->get();
    
    return view('web/chatroom')->with(compact('group_user','group','chat','user'));
    }

    public function save_comment_msg(Request $request){
        if(Auth::check() == true){
            
            $chatting = new project_task_comment();
            $chatting->message = $request->message;

            $task = project_task::where("is_active" , 1)->where("is_deleted" , 0)->where("project_id" , $request->comment_project_id)->where("task_number" , $request->comment_task_id)->first();
            if ($task) {
                if ($task->dpt_to == Auth::user()->emp_id) {
                    $project = projects::where("project_number" , $request->comment_project_id)->first();
                    if ($project) {
                        $chatting->to_user_id = $project->user_id; 
                        $response['to_user_id'] = $project->user_id;
                        $to_user = User::where("emp_id" , $project->user_id)->first();
                        if ($to_user) {
                            $response['touserimage'] = $to_user->profile_pic;
                        }else{
                            $response['status']=false;
                            $response['error']="No active sales person found of this project.";
                            return json_encode($response);
                        }
                    }else{
                        $response['status']=false;
                        $response['error']="No active project found.";
                        return json_encode($response); 
                    }
                    
                    $chatting->from_user_id = Auth::user()->emp_id;  
                }else{
                    $chatting->to_user_id = $task->dpt_to;
                    $response['to_user_id'] = $task->dpt_to;
                    $to_user = User::where("emp_id" , $task->dpt_to)->first();
                    if ($to_user) {
                        $response['touserimage'] = Auth::user()->profile_pic;
                    }else{
                        $response['status']=false;
                        $response['error']="No active sales person found of this project.";
                        return json_encode($response);
                    }
                    $chatting->from_user_id = Auth::user()->emp_id;  
                }
                
            }else{
                $response['status']=false;
                $response['error']="No active task found.";
                return json_encode($response); 
            }

            $chatting->task_id = $request->comment_task_id;
            

            
             if($chatting->save()){

                $notifications = new notifications;
                $notifications->sender = $chatting->from_user_id;
                $notifications->receiver = $chatting->to_user_id;
                $notifications->data = "Comment on Task ID:".$request->comment_task_id;
                $notifications->msg = $request->message;
                $notifications->project_id = $request->comment_project_id;
                $notifications->save();

                $response['notification_sender'] = $notifications->sender;
                $response['notification_receiver'] = $notifications->receiver;
                $response['notification_data'] = $notifications->data;
                $response['notification_msg'] = $notifications->msg;
                

                $response['message'] = $request->message;
                $response['created_at'] = $chatting->created_at->diffForHumans();
                $response['status'] = true;

             }else{
                $response['status']=false;
             }   
          return json_encode($response);   
        }else
        {
            $response['status']=false;
            return json_encode($response);  
        }
 }

 public function fetch_comment_msg()
 {
    $user = Auth::user();
    $task_id = $_POST['task_id'];
    $project_id = $_POST['project_id'];
    $chatting = project_task_comment::where("task_id" , $task_id)->get();
    $body = "";
    if ($chatting) {
        foreach ($chatting as $key => $value) {
            if ($value->from_user_id == $user->emp_id) {
                //Sender    
                $body .="<div class='media right-side-chat'><p class='f-w-400'>".$value->created_at->diffForHumans()."</p><div class='media-body text-end'><div class='message-main pull-right'><span class='mb-0 text-start'>".$value->message."</span><div class='clearfix'></div></div></div></div>";
            }else{
                $to_user = User::where("emp_id" , $value->from_user_id)->first();
                //$img = asset($to_user->profile_pic);
                $img = asset('images/user.jpg');
                $body .="<div class='media left-side-chat'><div class='media-body d-flex'><div class='img-profile'><img class='img-fluid' src='".$img."' alt='Profile' /></div><div class='main-chat'><div class='message-main'><span class='mb-0'>".$value->message."</span></div></div></div><p class='f-w-400'>".$value->created_at->diffForHumans()."</p></div>";
            }
            
        }
    }
    $response['status']=1;
    $response['body']=$body;
    return json_encode($response);
 }
 public function fetch_msg()
    {
        // dd($_POST);
        $user = Auth::user();
        $id = Auth::user()->id;
        
        if (!$user) {
           return redirect('login')->with('notify_error',"Kindly login First"); 
        }
        
        $messages = chat::select('message','to_user_id','from_user_id','created_at')->where('is_active',1)->where('from_user_id',$id)->where('to_user_id',$_POST['to'])->orWhere('to_user_id',$id)->where('from_user_id',$_POST['to'])->where('is_active',1)->get();
        // dd($messages);
            $msg_body = "";
            if($user){
                    foreach($messages as $value){

                            // dd($value);
                                    
                                    $dummyimage=asset('web_assets/images/download.png');
                                    $clock=asset('web_assets/images/clock.png');
                                if($value->from_user_id == $id){
                                    $toname = $user->user_name;
                                    $toimage=asset($user->profile_pic);
                                   $userimage=(!empty($value->to->profile_pic))?$toimage:$dummyimage;
                                    
                                    //Sender Member
                                    $msg_body = $msg_body . '<div class="profile-inner-full-chat">';
                                    $msg_body = $msg_body . '<div class="profile-inner-full-chat-from">';
                                    $msg_body = $msg_body . '<ul>';
                                    $msg_body = $msg_body . '<li class="profile-inner-full-chat-from-image"><img src="'.$userimage.'"><span></span></li>';
                                    $msg_body = $msg_body . '<li class="profile-inner-full-chat-from-text">';
                                    $msg_body = $msg_body . '<div class="profile-inner-full-chat-from-name">';
                                    $msg_body = $msg_body . '<h1>'.$toname.'</h1>';
                                    $msg_body = $msg_body . '<div class="chat-dropdown-report">';
                                    
                                    // $msg_body = $msg_body . '<nav class="navbar navbar-expand-lg"> <div class="collapse navbar-collapse" id="navbarSupportedContent"> <ul class="navbar-nav mr-auto"> <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ... </a> <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">Report</a> </div> </li> </ul> </div> </nav>';
                                    $msg_body = $msg_body . '</div></div>';
                                    $msg_body = $msg_body . '<p>'.$value->message.'<span><img src="'.$clock.'">'. $value->created_at->diffForHumans().'</span></p>';
                                    $msg_body = $msg_body . '</li></ul></div></div>';

                                }else{
                                    // Receiver Member
                                    $fromname = $value->from->user_name;
                                     $fromimage=asset('uploads/profile/'.$value->from->profile_image);
                                     $userimage=(!empty($value->from->profile_image))?$fromimage:$dummyimage;
                                    $msg_body = $msg_body . '<div class="profile-inner-full-chat profile-inner-full-chat-right">';
                                    $msg_body = $msg_body . '<div class="profile-inner-full-chat-from">';
                                    $msg_body = $msg_body . '<ul>';
                                   
                                    $msg_body = $msg_body . '<li class="profile-inner-full-chat-from-text profile-inner-full-chat-from-right-text">';
                                    $msg_body = $msg_body . '<div class="profile-inner-full-chat-from-name profile-inner-full-chat-from-name-right-chat">';
                                    $msg_body = $msg_body . '<div class="chat-dropdown-report">  </div>';
                                    // <nav class="navbar navbar-expand-lg"> <div class="collapse navbar-collapse" id="navbarSupportedContent"> <ul class="navbar-nav mr-auto"> <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ... </a> <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">Report</a> </div> </li> </ul> </div> </nav>
                                     $msg_body = $msg_body . '<h1>'.$fromname.'</h1>';
                                     $msg_body = $msg_body . '</div>';
                                     $msg_body = $msg_body . '<p><span><img src="'.$clock.'">'. $value->created_at->diffForHumans().'</span>'.$value->message.'</p>';
                                     $msg_body = $msg_body . '</li>';
                                     $msg_body = $msg_body . '<li class="profile-inner-full-chat-from-image"><img src="'.$userimage.'"><span></span></li>';
                                     $msg_body = $msg_body . '</ul></div></div>';
                                }
                            }

                }

            $response = json_encode($msg_body);
            return $response;
            }

    public function group_submit(Request $request)
    {
        $user = Auth::user();
        $groups  = new groups;

        $groups->user_id = $user->id;
        $groups->name = $request->group_name;
        $groups->save();

        $body["status"] = 1;
        $body["group_id"] = $groups->id;
        $response = json_encode($body);
        return $response;
    }

    public function addgroup_submit(Request $request)
    {
        $user = Auth::user();
        
        $members = $_POST['member_id'];
        if (count($members) < 1) {
            $body["status"] = 0;
            $body["msg"] = "No member seleced";
            $response = json_encode($body);
            return $response;
        }
        $group_main_user = group_user::where("is_active" , 1)->where("user_id" , $user->id)->where("group_id" , $request->group_id)->first();
        if (!$group_main_user) {

            $group_user = new group_user;
            $group_user->user_id = $user->id;
            $group_user->group_id = $request->group_id;
            $group_user->save();
        }
        $i = 0;
        foreach ($members as $key => $value) {
            $group_main_user = group_user::where("is_active" , 1)->where("user_id" , $value)->where("group_id" , $request->group_id)->first();
            if ($group_main_user) {
                
            }else{
                $group_user = new group_user;
                $group_user->user_id = $value;
                $group_user->group_id = $request->group_id;
                $group_user->save();
                $i++;
            }
        }
       
        $body["status"] = 1;
        if ($i == 0) {
            $body["msg"] = "All Member added in your group";
        }else{
            $body["msg"] = "Only ".$i." member added in your group.";
            
        }
        
        $response = json_encode($body);
        return $response;
    }

    
}