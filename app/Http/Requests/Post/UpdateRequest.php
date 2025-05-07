<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $post = $this->route('post');

        return [
            'title' => 'required|string|unique:posts,title,' . $post->id . ',id',
            'description' => 'string|max:255',
            'content' => 'required|string',
            'image' => 'image',
            'category_id' => 'integer',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'Пост с таким названием уже существует',
        ];
    }
}
