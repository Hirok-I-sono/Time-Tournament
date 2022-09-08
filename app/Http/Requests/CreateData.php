<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateData extends FormRequest
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
            'date' => 'required|date',
            'player_id' => 'required',
            'place_id' => 'required',
            'tournament_id' => 'required',
            'event_id' => 'required',
            'result' => 'required|max:100',
            'memo' => 'max:300'
        ];
    }
}
