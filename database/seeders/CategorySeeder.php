<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FacadesFile;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = FacadesFile::get('database/data/categories.json');
        $categories = collect(json_decode($json));

        $categories->each(function($category) {
            Category::create([
                'name' => $category->name,
                'description' => $category->description,
                'slug' => $category->slug
            ]);
        });
    }
}
