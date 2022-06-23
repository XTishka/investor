<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoundRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'round_range' => ['required'],
            'end_wishes_date' => ['date', 'after:today', 'before:start_round_date'],
            'start_round_date' => ['required', 'date', 'after:end_wishes_date'],
            'end_round_date' => ['date', 'after:start_round_date'],
            'description' => ['nullable'],
            'max_wishes' => ['required'],
        ];
    }
}
