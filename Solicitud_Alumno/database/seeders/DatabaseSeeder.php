<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Database\Seeders\TeacherSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CompanySeeder::class,
            TeacherSeeder::class,
        ]);
    }
}
