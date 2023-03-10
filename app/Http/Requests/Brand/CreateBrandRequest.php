<?php

namespace App\Http\Requests\Brand;

use App\Models\brand;
use App\Models\brand_target;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class CreateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('add-brand');
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
            'slug' => ['required', 'string', 'min:3', 'max:255','unique:brands'],
        ];
    }
    public function messages()
    {
        return [
            'slug.unique' => 'Brand is Already Exists',
        ];
    }

    public function handle()
    {

        $this->validated();
        $params = $this->all();

        $brand = new brand();

        $brand->name = $params['name'];
        $brand->slug = $params['slug'];
        $brand->sales_id = auth()->user()->emp_id;

        $brand->save();

        $checkDuplicate = brand_target::where('id',$brand->id)->where('target_month', date('y-m-d' , strtotime($params['monthyear'])))->get();

        if (is_null($checkDuplicate)){
            return false;
        }

        $brand_target = new brand_target();

        $brand_target->brand_id = $brand->id;
        $brand_target->create_by = auth()->user()->emp_id;
        $brand_target->target_amount = $params['targetamount'];
        $brand_target->target_month = date('y-m-d' , strtotime($params['monthyear'])) ;
        $brand_target->brand_manager_id	 = $params['brandmanager'];

        $brand_target->save();

        return true;
    }
}
