<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCredentialsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules= [
            'username' => 'required|unique:users',
            'password' => 'required',
        ];

        return $rules;
    }
}
