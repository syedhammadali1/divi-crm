<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class DesignProjectRequest extends FormRequest
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
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Project Name is required',
            'client_name.required' => 'Client Name is required',
            'client_email.required' => 'Client Email is required',
//            'client_phone.required' => 'Client Contact Number is required',
            'project_cost.required' => 'Project Cost is required',
            'due_date.required' => 'Due Date is required',
            'category.required' => 'Category is required',
//            'paid_cost.required' => 'Project Paid Cost is required',
            'project_type.required' => 'Project Type is required',
            'project_priority.required' => 'Project Priority is required',
            'project_details.required' => 'Project Details is required',
//            'project_package.required' => 'At-least one package is required',
            'brands.required' => 'Brand is required',
//            'trans_id.required' => 'Project Transition ID is required',
        ];
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'client_name' => 'required',
            'client_email' => 'required',
            'project_cost' => 'required',
            'due_date' => 'required',
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
