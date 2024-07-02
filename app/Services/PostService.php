<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data)
    {
        return $post->update($data);
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }
}



