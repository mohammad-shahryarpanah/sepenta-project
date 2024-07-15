<?php

namespace App\Http\Requests;

use App\Services\ResponseBuilderService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class RegisterRequest extends FormRequest
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
        return [
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }

        public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = ResponseBuilderService::sendValidationError($errors,null);
        throw new HttpResponseException($response);
    }
}
