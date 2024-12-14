<?php

namespace App\Http\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends GetIdRequest
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
        return array_merge( parent::rules() + [
            'name' => ['required', 'string', 'max:255'],
//            'avatar' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->id)],
            'password' => ['required', 'string', 'min:3', 'max:255']
        ]);
    }

    public function validationData(): ?array
    {
        return array_merge($this->route()->parameters(), $this->all());
    }
}
