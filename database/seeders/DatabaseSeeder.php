<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            DepartmentSeeder::class,
            TeamSeeder::class,
            TeamMemberSeeder::class,
            EvaluationSeeder::class,
            ReportSeeder::class,
            ReportActivitySeeder::class
        ]);
    }
}
