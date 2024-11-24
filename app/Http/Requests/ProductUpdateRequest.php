<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        return  [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:100',
            'quantity' => 'required|numeric|min:0',
            'sku' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,webp,jpeg|max:5000'

        ];
    }
}
