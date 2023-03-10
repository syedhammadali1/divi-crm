<?php

namespace App\Http\Requests\SourceAccount;

use App\Models\SourceAccount;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateSourceAccountRequest extends FormRequest
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
            'name' => 'required'
        ];
    }
    public function handle()
    {

        $user = Auth::user();

        $this->validated();
        $params = $this->all();
        $item = new SourceAccount();
        $item->name = $params['name'];
        $item->email = $params['email'];
        $item->create_by = $user->id;

        $item->save();
        return true;
    }
}
