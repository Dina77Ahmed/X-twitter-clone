<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $CommentId = $this->route('comment'); // Assuming 'idea' is the parameter name in your route definition
        $rules = [
            'my_comment' => [
                'required',
                'max:240',
                'min:5',
                Rule::unique('comments', 'my_comment')->ignore($CommentId),
            ],
        ];

        return $rules;
    }
}
