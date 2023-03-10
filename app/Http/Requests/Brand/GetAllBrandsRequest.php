<?php

namespace App\Http\Requests\Brand;

use App\Models\brand;
use App\Models\brandEmployee;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;
use Illuminate\Support\Facades\Auth;

class GetAllBrandsRequest extends FormRequest
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

    public function handle()
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        if ($userRole != "admin" && $userRole != "hod sales and support") {
            $brands = brandEmployee::with('brandName.brandSalesPerson','brandName.brandProjects')->where('employee_id', $user->emp_id)->get();
        } else {
            $brands = brand::with('brandSalesPerson' , 'brandProjects')->get();
        }
        return $brands;
    }

    public function handleForlisting()
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        if ($userRole != "admin" && $userRole != "hod sales and support") {
            $brands = brandEmployee::with('brandName.brandSalesPerson')->where('employee_id', $user->emp_id)->get();
        } else {
            $brands = brand::with('brandSalesPerson')->get();
        }
        return $brands;
    }
}
