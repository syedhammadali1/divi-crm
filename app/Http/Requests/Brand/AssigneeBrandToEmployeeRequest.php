<?php

namespace App\Http\Requests\Brand;

use App\Models\brand;
use App\Models\brandEmployee;
use Illuminate\Foundation\Http\FormRequest;

class AssigneeBrandToEmployeeRequest extends FormRequest
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
        $brandId = $params['brand_id'];
        $brandEmployee = brandEmployee::where('brand_id',$brandId)->pluck('employee_id')->toArray();
//        dd($brandEmployee);

        foreach ($params['employees'] as $employee) {
            if(!in_array($employee , $brandEmployee)){
                $data = array(
                    'brand_id'     =>   $params['brand_id'],
                    'employee_id'     =>  $employee,
                );
                brandEmployee::create($data);
            }
        }
        return true;
    }
}
