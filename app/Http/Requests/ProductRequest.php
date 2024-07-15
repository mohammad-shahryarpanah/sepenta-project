<?php

namespace App\Http\Requests;

use App\Services\ResponseBuilderService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'sku' => 'required|string|max:24',
            'slug' => 'required|string|max:255',
            'status' => 'boolean',
            'price' => 'nullable|integer',
            'discount_price' => 'nullable|integer',
            'description' => 'nullable|string',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = ResponseBuilderService::sendValidationError($errors, null);
        throw new HttpResponseException($response);
    }
}
