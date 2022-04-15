<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => [
                'required',
                'unique:App\Models\User,name',
                'min:6',
                'max:20',
                'string'
            ],
            'email' => [
                'required',
                'unique:App\Models\User,email',
                'max:30',
                'email'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:30',
                'confirmed',
            ],
        ];
    }
}
