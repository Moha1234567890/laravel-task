<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "title" => "category 1",
            "details" => "details 1",
        ]);

        Category::create([
            "title" => "category 2",
            "details" => "details 2",
        ]);
    }
}
