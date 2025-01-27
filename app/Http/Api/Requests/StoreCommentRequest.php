<?php

namespace App\Http\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'comment' => ['required', 'string', 'max:1000'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'task_id' => ['required', 'integer', 'exists:tasks,id'],
            'parent_id' => ['nullable', 'integer', 'exists:comments,id'],
        ];
    }
}
