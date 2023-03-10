<?php

namespace App\Http\Requests\BrandTarget;

use App\Models\brand_target;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;

class CreateBrandTargetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('add-brand-target');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'targetamount' => ['required'],
        ];
    }

    public function handle()
    {

        $this->validated();
        $params = $this->all();

        $checkDuplicate = brand_target::where('id',$params['brand'])->where('target_month', date('y-m-d' , strtotime($params['monthyear'])))->get();

        if (is_null($checkDuplicate)){
            return false;
        }

        $brand_target = new brand_target();

        $brand_target->brand_id = $params['brand'];
        $brand_target->create_by = auth()->user()->emp_id;
        $brand_target->target_amount = $params['targetamount'];
        $brand_target->target_month = date('y-m-d' , strtotime($params['monthyear'])) ;
        $brand_target->brand_manager_id	 = $params['brandmanager'];

        $brand_target->save();

        return true;
    }
}
