<?php

namespace App\Http\Requests\Role;

use App\Models\role;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'name' => 'required', 'string', 'min:3', 'max:100',
            'title' => 'required', 'string', 'min:3', 'max:100',
        ];
    }

    public function handle()
    {
        $this->validated();
        $params = $this->all();

        $role = role::find($this->id);

        $role->name = $params['name'];
        $role->title = $params['title'];

        $role->save();
        return true;
    }
}
