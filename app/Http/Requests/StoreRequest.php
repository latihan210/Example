<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $logoRules = ['image', 'mimes:png,jpg,jpeg,gif,svg', 'max:2048'];

        if ($this->isMethod('post')) {
            // For creation (POST), the logo is required.
            array_unshift($logoRules, 'required');
        } else {
            // For update (PUT/PATCH), the logo is optional.
            array_unshift($logoRules, 'sometimes');
        }

        return [
            'logo' => $logoRules,
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:3',]
        ];
    }
}
