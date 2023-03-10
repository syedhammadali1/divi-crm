<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Bouncer;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('edit-user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'username' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'email'],
//            'emp_id' => ['required'],
//            'salary' => ['required'],
        ];
    }

    public function handle()
    {

        $this->validated();
        $params = $this->all();
        $user = User::find($this->id);

        $user->retract($user->getRoles());

        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->department = $params['department'];
//        $user->emp_id = $params['emp_id'];
//        $user->salary = $params['salary'];
        $user->salary = 0;

        if ($params['reportingmanager'] == 'self') {
            $user->reporting_line = $params['email'];
        } else {
            $user->reporting_line = $params['reportingmanager'];
        }

        $user->username = $params['username'];
        if (isset($params['password'])){
            $user->password = Hash::make($params['password']);
        }

        $user->save();
        $user->assign($params['roles']);
        return true;
    }
}
