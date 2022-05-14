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
            'image' => ['',],
            'chpu' => [''],
            'fullname' => [''],
            'h1' => [''],
            'description' => [''],
            'media' => [''],
            'shurt_description' => [''],
            'content' => [''],
            'regnumber' => [''],
            'specialities' => [''],
            'publishing' => [],
            'interval' => [''],
            'services' => ['']
        ];
    }
}
