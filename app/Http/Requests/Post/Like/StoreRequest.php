<?php

namespace App\Http\Requests\Post\Like;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !$this->post->isLikedBy($this->user()->id);
    }

    public function rules(): array
    {
        return [];
    }
}
