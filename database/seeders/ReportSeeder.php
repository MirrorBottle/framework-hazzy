<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 2; $i++) {
            Report::factory(3)->create([
                'company_id' => 1,
                'team_id' => $i
            ]);
        }

        for ($i=3; $i <= 4; $i++) {
            Report::factory(3)->create([
                'company_id' => 2,
                'team_id' => $i
            ]);
        }
    }
}
