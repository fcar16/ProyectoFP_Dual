<?php

namespace Database\Seeders;

use App\Models\Company;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Google',
            'website' => 'https://www.google.com',
            'NIF' => '12345678A',
        ]);
        Company::create([
            'name' => 'Facebook',
            'website' => 'https://www.facebook.com',
            'NIF' => '12345678B',
        ]);
        Company::create([
            'name' => 'Amazon',
            'website' => 'https://www.amazon.com',
            'NIF' => '12345678C',
        ]);




        DB::table('company_student')->insert([
            'company_id' => 1,
            'student_id' => 1,
            'question' => 'What is your favorite color?',
        ]);

        DB::table('company_student')->insert([
            'company_id' => 1,
            'student_id' => 2,
            'question' => 'What is your favorite animal?',
        ]);

        DB::table('company_student')->insert([
            'company_id' => 2,
            'student_id' => 3,
            'question' => 'What is your favorite food?',
        ]);
    }
}
