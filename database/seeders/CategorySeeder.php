<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = new Category();
        $categories->name = 'Teknologi Informasi';
        $categories->slug = 'Teknologi Informasi';
        $categories->save();
    }
}
