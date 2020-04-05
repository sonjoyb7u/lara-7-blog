<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'full_name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'user_name' => 'required|min:4|max:20|unique:users',
            'image' => 'required|image|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',

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
            'full_name.required' => 'Full Name field must be filled out!',
            'full_name.max:25' => 'Full Name must be less than 25 Character\'s!',
            'email.required' => 'Email field must be filled out!',
            'email.email' => 'Enter valid email address!',
            'email.unique' => 'Email address has already been taken!',
            'user_name.required' => 'User Name field must be filled out!',
            'user_name.min:6' => 'User Name must be minimum 6 Character\'s!',
            'user_name.max:6' => 'User Name must be less than 20 Character\'s!',
            'user_name.unique' => 'User Name has already been taken!',
            'image.required' => 'Image field must be filled out!',
            'image.image' => 'Invalid Image file!',
            'image.unique' => 'Image has already been taken!',
            'password.required' => 'Password field must be filled out!',
            'password.min:6' => 'Password must be minimum 6 digits!',
            'password_confirmation.required' => 'Confirm password field must be filled out!',
            'password_confirmation.min:6' => 'Confirm Password must be minimum 6 digits!',

        ];
    }
}
