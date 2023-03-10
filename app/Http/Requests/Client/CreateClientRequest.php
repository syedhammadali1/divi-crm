<?php

namespace App\Http\Requests\Client;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class CreateClientRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:32'],
            'phone' => ['required'],
        ];
    }
    public function handle()
    {

        $this->validated();
        $params = $this->all();
        $user = new User();

        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->phonenumber = $params['phone'];
        $user->password = Hash::make($params['password']);
        $user->type = 1;
        $user->is_active = 0;

        $user->save();
        $user->assign('client');
        return true;
    }
}
