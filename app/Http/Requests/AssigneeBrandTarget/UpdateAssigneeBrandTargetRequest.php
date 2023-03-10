<?php

namespace App\Http\Requests\AssigneeBrandTarget;

use App\Models\AssigneeBrandTarget;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAssigneeBrandTargetRequest extends FormRequest
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
        $assigneItem = AssigneeBrandTarget::findOrNew($this->id);

        if ($params['assigneetype'] == 1 && $params['salesmanager'] != null) {
            $assigneItem->assignee_type = 1;
            $assigneItem->assigner_emp_id = $params['salesmanager'];
            $assigneItem->target_amount = $params['salestargetamount'];
            $assigneItem->create_by = auth()->user()->emp_id;

            $assigneItem->save();
        }

        if ($params['assigneetype'] == 2 && $params['supportmanager'] != null) {
            $assigneItem->assignee_type = 2;
            $assigneItem->assigner_emp_id = $params['supportmanager'];
            $assigneItem->target_amount = $params['supporttargetamount'];
            $assigneItem->create_by = auth()->user()->emp_id;

            $assigneItem->save();
        }

        if ($params['assigneetype'] == 3 && $params['remainamount'] != 0) {
            $assigneItem->assignee_type = 3;
            $assigneItem->assigner_emp_id = auth()->user()->emp_id;
            $assigneItem->target_amount = $params['remainamount'];
            $assigneItem->create_by = auth()->user()->emp_id;

            $assigneItem->save();
        }
        return true;
    }
}
