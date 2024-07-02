<?php

namespace App\Services;

use App\Models\PostImage;
use Illuminate\Support\Facades\Storage;

class PostImageService
{
    public function create(array $data)
    {
        if (isset($data['image_path'])) {
            $data['image_path'] = $data['image_path']->store('images', 'public');
        }

        return PostImage::create($data);
    }

    public function delete(PostImage $postImage)
    {
        // Удаление изображения с диска
        Storage::disk('public')->delete($postImage->image_path);
        return $postImage->delete();
    }
}


