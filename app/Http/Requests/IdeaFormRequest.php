<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IdeaFormRequest extends FormRequest
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
        $ideaId = $this->route('idea'); // Assuming 'idea' is the parameter name in your route definition

    $rules = [
        'content' => [
            'required',
            'max:240',
            'min:5',
            Rule::unique('ideas', 'content')->ignore($ideaId),
        ],
    ];
          return $rules;
    }
}
