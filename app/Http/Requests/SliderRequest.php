<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required|unique:sliders|max:50',
            'desc' => 'required',
            'image' => 'required|image',
            'link' => 'required',
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
            'title.required' => 'Slider title field must be filled out!',
            'title.unique' => 'Slider title has already been taken!',
            'title.max' => 'Slider title must be less than 50 Character\'s!',
            'desc.required' => 'Slider Description field must be filled out!',
            'image.required' => 'Slider image field must be filled out!',
            'image.image' => 'Slider Image file must be png,jpeg/jpg extension!',
            'link.required' => 'Link field must be filled out!',
            'status.required' => 'Status field option must be selected!',

        ];
    }
}
