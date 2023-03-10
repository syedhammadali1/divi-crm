<?php

namespace App\Http\Requests\StickyNote;

use App\Models\myStickyNote;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;
use Illuminate\Support\Facades\Auth;

class GetMyStickyNote extends FormRequest
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
        return myStickyNote::findOrNew($this->id);
    }
    public function handleEdit(){
        $user = Auth::user();
        $note = myStickyNote::where('id', $this->id)->where('user_id', $user->id)->first();

        if (isset($note)){
            return $note;
        }else{
            return false;
        }
    }
}
