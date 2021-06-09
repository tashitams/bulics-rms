<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subject_id.*'    => 'bail|required|exists:subjects,id',
            'marks.*'         => 'bail|required|numeric|between:0,100',
        ];
    }

    public function messages()
    {
        return [
            'subject_id.required'  => 'Subject ID is required',
            'subject_id.exists'    => 'Invalid Subject ID',
            'marks.required'       => 'Marks field is required',
            'marks.between'        => 'Marks should be between 0 and 100',
        ];
    }
}
