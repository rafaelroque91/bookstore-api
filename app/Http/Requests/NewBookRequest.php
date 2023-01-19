<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBookRequest extends FormRequest
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
            'name' => 'required|string|unique:book_registries|max:100',
            'isbn' => 'required|numeric|unique:book_registries|digits:13',            
            'value' => 'required|numeric|gt:0',
        ];
    }
}
