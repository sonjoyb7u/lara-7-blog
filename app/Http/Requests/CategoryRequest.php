<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
//        return [
//            //
//
//        ];

        if($this->method() == 'PUT') {
            $rules = [
                'name' => 'required|max:20',
                'slug' => 'max:100',
                'status' => 'required',
            ];

        } elseif($this->method() == 'PATCH') {
            $rules = [
                'name' => 'required|max:20',
                'slug' => 'max:100',
                'status' => 'required',
            ];

        } else {
            $rules = [
                'name' => 'required|unique:categories|max:20',
                'slug' => 'unique:categories|max:100',
                'status' => 'required|between:0, 1',
            ];
        }

        return $rules;

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
            'name.required' => 'Category Name field must be filled out!',
            'name.unique' => 'Category Name has already been taken!',
            'name.max:25' => 'Category Name must be less than 20 Character\'s!',
            'slug.unique' => 'Category slug has already been taken!',
            'status.required' => 'Status field option must be selected!',
            'status.between' => 'Status option must be 0 or 1',

        ];
    }
}
