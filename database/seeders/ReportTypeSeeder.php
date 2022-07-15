<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = [
            ['reportType' => 'compliance','reportLabel' => 'Compliance Report'],
            ['reportType' => 'self-survey','reportLabel' => 'Self-Survey Report']
        ];
        foreach($reports as $report){
            Report::create($report);
        }
    }
}
