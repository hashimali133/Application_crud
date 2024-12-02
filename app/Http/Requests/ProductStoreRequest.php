<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|min:0',
            'sku' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpg,png,webp,jpeg,pdf,doc,xlsx|max:5000'

        ];
    }
}
