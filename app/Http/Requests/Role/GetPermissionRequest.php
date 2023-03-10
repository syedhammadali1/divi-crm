<?php

namespace App\Http\Requests\Role;

use App\Models\Ability;
use Illuminate\Foundation\Http\FormRequest;

class GetPermissionRequest extends FormRequest
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
            //
        ];
    }
    public function handle(){
        return Ability::findOrNew($this->id);
    }
}
