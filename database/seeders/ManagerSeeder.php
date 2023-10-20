<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manager;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = new Manager();
        $manager->nip = '2017';
        $manager->name = 'Lukman Hakim';
        $manager->email = 'man@gmail.com';
        $manager->save();
    }
}
