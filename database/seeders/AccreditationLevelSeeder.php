<?php

namespace Database\Seeders;

use App\Models\AccreditationLevel;
use Illuminate\Database\Seeder;

class AccreditationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accredLevel = [
            ['accreditationLevel' => 1,'accreditationLabel' => 'Level 1'],
            ['accreditationLevel' => 2,'accreditationLabel' => 'Level 2']
        ];
        foreach($accredLevel as $level){
            AccreditationLevel::create($level);
        }

    }
}
