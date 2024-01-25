<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
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
    {   $userId=$this->route('user');
        return [
            'name' => [
                'required',
                'max:50',
                'min:2',
                Rule::unique('users', 'name')->ignore($userId),
            ],
            'bio' => [
                'required',
                'max:149',
                'min:3',
                Rule::unique('users', 'bio')->ignore($userId),
            ],
        ];
    }
}
