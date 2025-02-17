<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Teacher::create([
            'dni' => '31029311B',
            'name' => 'Fran',
            'email' => 'Franciscocarmonalopez7@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
