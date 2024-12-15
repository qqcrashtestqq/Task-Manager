<?php

namespace App\Http\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends GetIdRequest
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
        return array_merge(parent::rules() + [
                'title' => ['nullable', 'string', 'max:255'],
                'description' => ['nullable', 'string', 'max:255'],
                'completed' => ['nullable', 'integer', 'max:3']
            ]);
    }
}
