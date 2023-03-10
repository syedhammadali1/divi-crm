<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Bouncer;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('add-user');
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
                'email' => ['required', 'email','unique:users'],
                'emp_id' => ['required'],
//                'salary' => ['required'],
                'password' => ['required', 'string', 'min:8', 'max:32'],
        ];
    }

    public function handle()
    {

        $this->validated();
        $params = $this->all();
        $user = new User();

        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->username = $params['username'];
        $user->emp_id = $params['emp_id'];
//        $user->salary = $params['salary'];
        $user->salary = 0;
        $user->department = $params['department'];

        if ($params['reportingmanager'] == 'self') {
            $user->reporting_line = $params['email'];
        } else {
            $user->reporting_line = $params['reportingmanager'];
        }

        $user->password = Hash::make($params['password']);
        $user->type = 2;

        $user->save();
        $user->assign($params['roles']);
        return true;
    }
}
