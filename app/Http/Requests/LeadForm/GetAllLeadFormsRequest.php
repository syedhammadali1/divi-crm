<?php

namespace App\Http\Requests\LeadForm;

use App\Models\LeadForm;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Bouncer;

class GetAllLeadFormsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-lead-form');
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

        $authUser = Auth::user();
        $userRole = $authUser->getRoles()->first();

        $leadforms = LeadForm::with('brandByID');

        if ($userRole != "admin" && $userRole != "hod sales and support"){
            if ($userRole == 'sales'){
                $leadforms = $leadforms ->where('assigner_id',$authUser->emp_id);
            }else{
                $leadforms = $leadforms ->whereHas('brandByID', function (Builder $query) use ($authUser) {
                    $query->where('employee_id', $authUser->emp_id);
                });
            }

        }
        $leadforms = $leadforms->get();

        return $leadforms;
    }
}
