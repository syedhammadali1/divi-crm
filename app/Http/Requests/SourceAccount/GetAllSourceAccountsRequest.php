<?php

namespace App\Http\Requests\SourceAccount;

use App\Models\SourceAccount;
use Illuminate\Foundation\Http\FormRequest;

class GetAllSourceAccountsRequest extends FormRequest
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
    public function handle(){
        return SourceAccount::all();
    }
}
