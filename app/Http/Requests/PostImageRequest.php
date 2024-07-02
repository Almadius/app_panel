<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostImageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post_id' => 'required|exists:posts,id',
            'image_path' => 'required|image|max:2048',
        ];
    }
}

