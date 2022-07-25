<?php

namespace Database\Seeders;

use App\Models\PublishStatus;
use Illuminate\Database\Seeder;

class PublishStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['publishID' => 1,'publishStatus' => 'Published'],
            ['publishID' => 2,'publishStatus' => 'Unpublished']
        ];
        foreach($statuses as $status){
            PublishStatus::create($status);
        }
    }
}
