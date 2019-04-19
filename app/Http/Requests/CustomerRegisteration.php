<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisteration extends FormRequest
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
            'name' => 'required|min:6',
            'email' => 'required|email|unique:customers',
            'username' => 'required|min:6|unique:customers',
            'password' => 'required|min:6|confirmed',
            'age' => 'required',
            'mobile' => 'required|phone:EG'
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mobile.phone'     => 'invalid mobile number',
            'email.unique'     => 'this email is not available',
            'username.unique'  => 'this username is not available'
        ];
    }
}
