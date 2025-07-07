<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules() 
    {
        return [
            'id' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'address' => 'nullable|string|max:255',
            'role' => 'required|string|in:3,2',
            'email' => 'nullable|email|max:255',
            'year' => 'required|integer|min:1|max:6',
            'department' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'The ID field is required.',
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'phone.required' => 'The phone number is required.',
            'role.required' => 'The role field is required.',
            'year.required' => 'The year field is required.',
            'department.required' => 'The department field is required.',
        ];
    }
}
