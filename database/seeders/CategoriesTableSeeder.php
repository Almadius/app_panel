<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Technology', 'Health', 'Travel', 'Food', 'Lifestyle'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}

