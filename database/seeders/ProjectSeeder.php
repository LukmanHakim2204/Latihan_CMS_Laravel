<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = new Project();
        $project->manager_id = '1';
        $project->name_project = 'Website UMKM';
        $project->category_id= '1';
        $project->description = 'Website umkm menggunakan laravel';
        $project->status = 'Inprogress';
        $project->save();
    }
}
