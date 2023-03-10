<?php

namespace App\Http\Requests\AssigneeBrandTarget;

use App\Models\AssigneeBrandTarget;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class GetAssigneeBrandTargetRequest extends FormRequest
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
        return AssigneeBrandTarget::findOrNew($this->id);
    }
    public function showHandle(){
        return AssigneeBrandTarget::with('brandTarget.brandName', 'brandTargetAssigner', 'brandTargetAssignerCreateBy')->where('brand_target_id',$this->id)->get();
    }
}
