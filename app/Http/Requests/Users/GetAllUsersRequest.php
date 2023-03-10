<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;
use Illuminate\Support\Facades\Auth;

class GetAllUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-users');
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

    public function handle(){
        return user::with('emp_department')->where('type',2)->where('id','!=',1)->get();
    }

    public function handleAllUsers(){

        $authUser = Auth::user();
        $userRole = $authUser->getRoles()->first();
        $user = user::with('emp_department')->where('type',2)->where('id','!=',1);
        if ($userRole != "admin"){
            $user = $user->where('reporting_line',$authUser->email)->where('email',"!=",$authUser->email);
        }
        $users = $user->get();

        return $users;
    }

    public function reportingManager(){
        return user::where('type',2)->where('id','!=',1)->get();
    }
}
