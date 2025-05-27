<?php

namespace App\Http\Requests\Post\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public $maxLength = 1000;

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
            'content' => ['required', 'string', ['max', $this->maxLength]]
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Вы не можете оставить пустой комментарий',
            'content.max' => "Превышен лимит длинны комментария: $this->maxLength символов",
        ];
    }
}
