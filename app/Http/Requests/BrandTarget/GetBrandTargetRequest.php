<?php

namespace App\Http\Requests\BrandTarget;

use App\Models\brand_target;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class GetBrandTargetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-brand-targets');
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
        return brand_target::findOrNew($this->id);
    }
}
