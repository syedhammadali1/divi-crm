<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProjects extends FormRequest
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

    public function messages()
    {
        return [
        'name.required' => 'Project Name is required',
        'client_name.required' => 'Client Name is required',
        'client_email.required' => 'Client Email is required',
        'client_phone.required' => 'Client Contact Number is required',
        'project_cost.required' => 'Project Cost is required',
        'paid_cost.required' => 'Project Paid Cost is required',
        'project_type.required' => 'Project Type is required',
        'project_priority.required' => 'Project Priority is required',
        'project_details.required' => 'Project Details is required',
        'project_package.required' => 'At-least one package is required',
        'brands.required' => 'Brand is required',
        'trans_id.required' => 'Project Transition ID is required',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'client_name' => 'required',
            'client_email' => 'required',
            'project_cost' => 'required',
//            'paid_cost' => 'required',
//            'client_phone' => 'required',
            'project_type' => 'required',
            'project_priority' => 'required',
            'project_details' => 'required',
//            'project_package' => 'required',
            'brands' => 'required',
//            'trans_id' => 'required',
        ];
    }
}
