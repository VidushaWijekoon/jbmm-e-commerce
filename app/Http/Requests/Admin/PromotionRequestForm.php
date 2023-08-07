<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequestForm extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'description' => ['required', 'string'],
            'promotion_starting_date' => ['required', 'date'],
            'promotion_discount' => ['required', 'integer'],
            'promotion_price' => ['required', 'integer'],
            'image' => ['required', 'mimes:png,jpg,jpeg'],
        ];
    }
}
