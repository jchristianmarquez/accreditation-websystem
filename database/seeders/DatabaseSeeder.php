<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminUserSeeder::class);
        $this->call(ApprovalStatusSeeder::class);
        $this->call(ApprovalTypeSeeder::class);
        $this->call(PublishStatusSeeder::class);
        $this->call(ReportTypeSeeder::class);
        $this->call(AccreditationLevelSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(ProgramSeeder::class);

    }
}
