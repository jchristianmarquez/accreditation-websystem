<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['shortname' => 'DBE','longname' => 'Department of Business Education', 'description' => 'DBA offers Bachelor of Science in Accountancy and Bachelor of Science in Accounting in Information Systems.'],
            ['shortname' => 'DCI','longname' => 'Department of Computer Informatics', 'description' => 'DCI offers Bachelor of Science in Computer Science and Bachelor of Science in Information Technology.'],
            ['shortname' => 'DTE','longname' => 'Department of Teaching Education', 'description' => 'DTE offers Bachelor in Elementary Education and Bachelor in Secondary Education']

        ];
        foreach($departments as $department){
            Department::create($department);
        }
    }
}
