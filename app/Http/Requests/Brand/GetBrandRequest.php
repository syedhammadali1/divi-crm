<?php

namespace App\Http\Requests\Brand;

use App\Models\brand;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class GetBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-brands');
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
        return brand::findOrNew($this->id);
    }
}
