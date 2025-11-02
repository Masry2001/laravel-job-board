<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BlogPostRequestValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'bail',
                'required',
                'max:255',
                Rule::unique('posts')->ignore($this->post),
            ],
            'body' => 'bail|required|max:999'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'This field is required',
            'title.unique' => 'This title already exists',
        ];
    }

}
