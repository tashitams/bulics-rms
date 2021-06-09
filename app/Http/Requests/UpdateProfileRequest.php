<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'       => 'bail|required|max:50|regex:/^[a-zA-Z\s\']+$/',
                    'username'   => 'bail|required|alpha_dash|max:50|unique:users,username,' .Auth::id(),
                ];
            }

            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.regex' => 'Name has invalid format. No special characters allowed',
            'name.max'      => 'Name can\'t be greater than 50 characters',
            'username.required'   => 'Username is required',
            'username.unique'   => 'This username is already registered',
            'username.alpha_dash'    => 'Username has invalid format. No spaces or special characters allowed',
            'username.max'      => 'Username can\'t be greater than 50 characters'
        ];
    }
}
