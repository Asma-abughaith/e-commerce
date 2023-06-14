<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAdminProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'You must provide a name.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'profile_photo_path.image' => 'The profile photo must be an image file.',
            'profile_photo_path.mimes' => 'The profile photo must be a JPEG, PNG, JPG, or GIF file.',
            'profile_photo_path.max' => 'The profile photo size must not exceed 2048 kilobytes.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errorMessage = $validator->errors()->first();
        $response = redirect()->route('admin.profile.edit')->withInput()->withErrors($validator);
        if ($errorMessage) {
            $notification = [
                'message' => $errorMessage,
                'alert-type' => 'error'
            ];
            $response->with($notification);
        }
        throw new HttpResponseException($response);
    }
}