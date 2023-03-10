<?php

namespace App\Http\Requests\StickyNote;

use App\Models\myStickyNote;
use Illuminate\Foundation\Http\FormRequest;
use Bouncer;
use Illuminate\Support\Facades\Auth;

class UpdateMyStickyNote extends FormRequest
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
            'message' => 'required'
        ];
    }

    public function handle()
    {
        $user = Auth::user();

        $this->validated();
        $params = $this->all();

        $note = myStickyNote::find($this->id);

        $note->user_id = $user->id;
        $note->message = $params['message'];

        $note->save();
        return true;
    }
}
