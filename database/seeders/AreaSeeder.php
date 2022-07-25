<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['areaNumber' => 1,'areaName' => 'Governance and Administration','publishStatus' => 2],
            ['areaNumber' => 2,'areaName' => 'Faculty','publishStatus' => 2],
            ['areaNumber' => 3,'areaName' => 'Curriculum & Instruction','publishStatus' => 2],
            ['areaNumber' => 4,'areaName' => 'Student Services','publishStatus' => 2],
            ['areaNumber' => 5,'areaName' => 'Entrepreneurship and Employability','publishStatus' => 2],
            ['areaNumber' => 6,'areaName' => 'Community Extension','publishStatus' => 2],
            ['areaNumber' => 7,'areaName' => 'Research','publishStatus' => 2],
            ['areaNumber' => 8,'areaName' => 'Library','publishStatus' => 2],
            ['areaNumber' => 9,'areaName' => 'Laboratories','publishStatus' => 2],
            ['areaNumber' => 10,'areaName' => 'Physical Plant','publishStatus' => 2]
        ];
        foreach($areas as $area){
            Area::create($area);
        }
    }
}
