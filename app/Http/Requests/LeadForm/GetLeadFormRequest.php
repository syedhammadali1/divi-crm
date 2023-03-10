<?php

namespace App\Http\Requests\LeadForm;

use App\Models\LeadForm;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class GetLeadFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-lead-form');
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
        return LeadForm::findOrNew($this->id);
    }

}
