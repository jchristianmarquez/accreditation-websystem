<?php

namespace Database\Seeders;

use App\Models\ApprovalStatus;
use Illuminate\Database\Seeder;

class ApprovalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['approvalStatusID' => 1,'status' => 'Approved'],
            ['approvalStatusID' => 2,'status' => 'Unapproved'],
            ['approvalStatusID' => 3,'status' => 'Not Needed']
        ];
        foreach($statuses as $status){
            ApprovalStatus::create($status);
        }
    }
}
