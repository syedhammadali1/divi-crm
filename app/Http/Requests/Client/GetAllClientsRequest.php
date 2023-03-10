<?php

namespace App\Http\Requests\Client;

use App\Models\projects;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;
use Illuminate\Support\Facades\Auth;

class GetAllClientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('view-clients');
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


//        if ($userRole == "admin" || $userRole == "hod sales and support"){

           $client = user::where('type', 1)->where('id', '!=', 1)->get();

//        }else{
//
//            $client = projects::with('client')->where('user_id', $user->emp_id)->get();
//        }

        return $client;
    }
}
