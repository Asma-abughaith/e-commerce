<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PasswordUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'oldpassword' => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[A-Z]/', $value)) {
                        $fail("The $attribute must contain at least one uppercase letter.");
                    }
                },
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[@$!%*#?&]/', $value)) {
                        $fail("The $attribute must contain at least one symbol.");
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one uppercase letter.',
            'password.regex2' => 'The password must contain at least one symbol.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $notification = [
            'message' => $validator->errors()->first(),
            'alert-type' => 'error'
        ];

        throw new HttpResponseException(
            redirect()->back()->withInput()->withErrors($validator)->with($notification)
        );
    }
}