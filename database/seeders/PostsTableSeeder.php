<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $categories = Category::all();

        foreach (range(1, 10) as $index) {
            $post = Post::create([
                'title' => 'Sample Post ' . $index,
                'content' => 'This is the content of sample post ' . $index,
                'status' => 'published',
                'user_id' => $userIds[array_rand($userIds)],
            ]);

            $post->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}

