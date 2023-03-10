<?php

namespace App\Http\Requests\AssigneeBrandTarget;

use App\Models\AssigneeBrandTarget;
use App\Models\brand_target;
use Illuminate\Foundation\Http\FormRequest;

class CreateAssigneeBrandTargetRequest extends FormRequest
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

        $this->validated();
        $params = $this->all();
        $assigneItem = new AssigneeBrandTarget();
        $brandtarget = brand_target::find($params['brand_target_id']);

        if ( ($params['assigneetype'] == 'forsalesmanager' && $params['salesmanager'] != null)  && $params['salestargetamount'] != 0) {

            $assigneItem->brand_target_id = $params['brand_target_id'];
            $assigneItem->assignee_type = 1;
            $assigneItem->assigner_emp_id = $params['salesmanager'];
            $assigneItem->target_amount = $params['salestargetamount'];
            $assigneItem->achieved_amount = 0;
            $assigneItem->target_month = $brandtarget->target_month;
            $assigneItem->create_by = auth()->user()->emp_id;

            $assigneItem->save();
        }elseif ( ($params['assigneetype'] == 'forsupportmanager' && $params['supportmanager'] != null) && $params['supporttargetamount'] != 0) {
            $assigneItem->brand_target_id = $params['brand_target_id'];
            $assigneItem->assignee_type = 2;
            $assigneItem->assigner_emp_id = $params['supportmanager'];
            $assigneItem->target_amount = $params['supporttargetamount'];
            $assigneItem->achieved_amount = 0;
            $assigneItem->target_month = $brandtarget->target_month;
            $assigneItem->create_by = auth()->user()->emp_id;

            $assigneItem->save();
        }elseif ($params['assigneetype'] == 'forown' &&  $params['remainamount'] != 0) {
            $assigneItem->brand_target_id = $params['brand_target_id'];
            $assigneItem->assignee_type = 3;
            $assigneItem->assigner_emp_id = auth()->user()->emp_id;
            $assigneItem->target_amount = $params['remainamount'];
            $assigneItem->achieved_amount = 0;
            $assigneItem->target_month = $brandtarget->target_month;
            $assigneItem->create_by = auth()->user()->emp_id;

            $assigneItem->save();
        }else{
            return false ;
        }
        return true;
    }

}
