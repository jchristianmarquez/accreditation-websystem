<?php

namespace Database\Seeders;

use App\Models\ApprovalTypes;
use Illuminate\Database\Seeder;

class ApprovalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $approvalTypes = [
            ['approvalID' => 1,'approver' => 'Director and QA'],
            ['approvalID' => 2,'approver' => 'QA'],
            ['approvalID' => 3,'approver' => 'Director']
        ];
        foreach($approvalTypes as $types){
            ApprovalTypes::create($types);
        }

    }
}
