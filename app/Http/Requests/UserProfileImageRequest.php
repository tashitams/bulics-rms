<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'avatar'     =>  'bail|required|image|mimes:jpeg,png,jpg|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'avatar.required'  => 'Please select an image',
            'avatar.image'     => 'Please select an image file type',
            'avatar.max'       => 'Your profile image should not be greater than 1 mb'
        ];
    }
}
