<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "title" => "category 1",
            "brand" => "brand 1",
            "image" => "img1.png",
            "details" => "details 1",
            "price" => "20",
        ]);

        Product::create([
            "title" => "category 1",
            "brand" => "brand 2",
            "image" => "img2.png",
            "details" => "details 1",
            "price" => "30",
        ]);
    }
}
