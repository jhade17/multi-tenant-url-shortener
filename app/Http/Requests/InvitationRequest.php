<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvitationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => [
                'required',
                'max:255',
            ],

            'name' => [
                'required',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
        ];
    }
}
