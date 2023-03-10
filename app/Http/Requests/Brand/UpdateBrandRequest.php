<?php

namespace App\Http\Requests\Brand;

use App\Models\brand;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class UpdateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('edit-brand');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }

    public function handle()
    {

        $this->validated();
        $params = $this->all();

        $brand = brand::find($this->id);

        $brand->name = $params['name'];
        $brand->slug = $params['slug'];
        $brand->sales_id = auth()->user()->emp_id;

        $brand->save();

        return true;
    }
}
