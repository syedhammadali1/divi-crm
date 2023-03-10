<?php

namespace App\Http\Requests\BrandTarget;

use App\Models\brand_target;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Bouncer;

class GetAllBrandTargetsRequest extends FormRequest
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

        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        $brand_targets = brand_target::with('brandName','brandTargetCreateBY','brandTargetManager');

        if ($userRole == "brand manager"){
            $brand_targets = $brand_targets->where('brand_manager_id',$user->emp_id);
        }

        return $brand_targets->get();
    }

}
