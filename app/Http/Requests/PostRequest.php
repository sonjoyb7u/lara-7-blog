<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'title' => 'required|unique:posts|max:100',
            'desc' => 'required',
            'image' => 'required|image',
            'status' => 'required',
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
            //
            'title.required' => 'Post title field must be filled out!',
            'title.unique' => 'Post title has already been taken!',
            'title.max' => 'Post title must be less than 100 Character\'s!',
            'image.required' => 'Image field must be filled out!',
            'image.image' => 'Image file must be png,jpeg/jpg extension!',
            'status.required' => 'Status field option must be selected!',

        ];
    }


}
