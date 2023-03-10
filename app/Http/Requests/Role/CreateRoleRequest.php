<?php

namespace App\Http\Requests\Role;

use App\Models\role;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class CreateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('add-role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required', 'string', 'min:3', 'max:100',
            'title' => 'required', 'string', 'min:3', 'max:100',
        ];
    }

    public function handle()
    {
        $this->validated();
        $params = $this->all();

        $role = new role();

        $role->name = $params['name'];
        $role->title = $params['title'];

        $role->save();
        return true;
    }
}
