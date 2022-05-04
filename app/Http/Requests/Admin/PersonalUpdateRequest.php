<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PersonalUpdateRequest extends FormRequest
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
            'image' => ['sometimes', 'mimes:jpg,jpeg,png,bmp, gif,svg,webp'],
            'fullname' => ['required'],
            'h1' => ['required'],
            'description' => ['required'],
            'media' => ['required', 'url'],
            'shurt_description' => ['required'],
            'content' => ['required'],
            'regnumber' => ['required'],
            'specialities' => ['required'],
            'publishing' => [],
            'interval' => ['required'],
            'services' => ['required']
        ];
    }
}
