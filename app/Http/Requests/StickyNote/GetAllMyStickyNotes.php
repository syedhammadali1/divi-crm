<?php

namespace App\Http\Requests\StickyNote;

use App\Models\myStickyNote;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Bouncer;

class GetAllMyStickyNotes extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Bouncer::can('my-sticky-note');
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
        return myStickyNote::where('user_id',$user->id)->get();
    }
}
