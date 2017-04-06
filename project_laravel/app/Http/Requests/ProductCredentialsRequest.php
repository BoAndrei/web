<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCredentialsRequest extends FormRequest
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
        $rules= [
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|integer'
        ];

        if ($this->input('_method') == NULL) {
            $rules = array_merge($rules, ['image' => 'required']);
        }

        return $rules;
    }
}
