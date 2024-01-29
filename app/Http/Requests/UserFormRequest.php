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
        $rules= [
            
            'name' => [
                'required',
                'max:50',
                'min:2',
                Rule::unique('users', 'name')->ignore($userId),
            ],

            'bio' => [
                'max:149',
                Rule::unique('users', 'bio')->ignore($userId),
            ],
        ];
        
        if(in_array($this->method(),['PUT'])){
            $rules['image']= ['mimes:png,jpg,jpeg','max:5048'];
          }
          return $rules;
    }
}
