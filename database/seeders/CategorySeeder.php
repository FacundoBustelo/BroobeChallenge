<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'ACCESSIBILITY'],
            ['name' => 'BEST_PRACTICES'],
            ['name' => 'PERFORMANCE'],
            ['name' => 'PWA'],
            ['name' => 'SEO'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}