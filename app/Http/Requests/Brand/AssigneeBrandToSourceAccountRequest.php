<?php

namespace App\Http\Requests\brand;

use App\Models\BrandSourceAccount;
use Illuminate\Foundation\Http\FormRequest;

class AssigneeBrandToSourceAccountRequest extends FormRequest
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
        $brandSourceAccount = BrandSourceAccount::where('brand_id',$brandId)->delete();

        foreach ($params['sourceaccounts'] as $sourceAccount) {
                $data = array(
                    'brand_id'     =>   $params['brand_id'],
                    'source_account_id'     =>  $sourceAccount,
                );
                BrandSourceAccount::create($data);
        }
        return true;
    }
}
