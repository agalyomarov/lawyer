<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PersonalStoreRequest extends FormRequest
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
            'image' => [''],
            'fullname' => ['required'],
            'h1' => [''],
            'description' => [],
            'media' => [],
            'shurt_description' => [''],
            'content' => [''],
            'regnumber' => [''],
            'specialities' => ['required'],
            'publishing' => ['required'],
            'interval' => ['required'],
            'services' => ['required']
        ];
    }
}
