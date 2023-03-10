<?php

namespace App\Http\Requests\Role;

use App\Models\Ability;
use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
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

        $ability = new Ability();

        $ability->name = $params['name'];
        $ability->title = $params['title'];

        $ability->save();
        return true;
    }
}
