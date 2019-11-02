<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;                    // now we dont care about automation 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()             // method "rules" should return rules
    {
        return [
            'value' => 'required|numeric|min:0|max:10',     
            'text' => 'required|min:10|max:160'
        ];
    }
}
