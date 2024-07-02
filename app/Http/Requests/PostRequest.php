<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:published,draft',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'image_path' => 'nullable|image|max:2048',
        ];
    }
}

