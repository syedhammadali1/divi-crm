<?php

namespace App\Http\Requests\Role;

use App\Models\role;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class GetAllRolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-roles');
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
        return role::all();
    }
}
