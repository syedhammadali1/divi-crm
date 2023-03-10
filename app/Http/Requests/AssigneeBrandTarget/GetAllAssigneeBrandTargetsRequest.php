<?php

namespace App\Http\Requests\AssigneeBrandTarget;

use App\Models\AssigneeBrandTarget;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class GetAllAssigneeBrandTargetsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-assignee-brand-targets');
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
        return AssigneeBrandTarget::with('brandTarget.brandName', 'brandTargetAssigner', 'brandTargetAssignerCreateBy')->get();
    }
}
