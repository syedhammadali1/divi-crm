<?php

namespace App\Http\Requests\LeadForm;

use App\Models\LeadForm;
use Illuminate\Foundation\Http\FormRequest;

class CreateLeadFormRequest extends FormRequest
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

    public function handle()
    {

        $params = $this->all();
        foreach ($params as $key => $item) {
            $leadform = new LeadForm();
            $leadform->name = str_replace('_', ' ', json_decode($key)->name) ?? '';
            $leadform->email = str_replace('_', ' ', json_decode($key)->email) ?? '';
            $leadform->phone = str_replace('_', ' ', json_decode($key)->phone) ?? '';
            $leadform->country = str_replace('_', ' ', json_decode($key)->country) ?? '';
            $leadform->brand_id = str_replace('_', ' ', json_decode($key)->brand_id) ?? '';
            $leadform->brand_name = str_replace('_', ' ', json_decode($key)->brand_name) ?? '';
            $leadform->interested_in = str_replace('_', ' ', json_decode($key)->interested_in) ?? '';

            $leadform->save();
        }
        return true;
    }
}
