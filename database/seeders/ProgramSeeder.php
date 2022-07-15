<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            ['shortname' => 'BSCS','longname' => 'Bachelor of Science in Computer Science', 'department' => 'DCI' , 'description' => 'Apply knowledge of computing fundamentals, knowledge of a computing specialization, and mathematics, science, and domain knowledge.'],
            ['shortname' => 'BSIT','longname' => 'Bachelor of Science in Information Technology', 'department' => 'DCI' , 'description' => 'Apply knowledge of computing, science, and mathematics appropriate to the discipline.'],
            ['shortname' => 'BSA','longname' => 'Bachelor of Science in Accountancy', 'department' => 'DBE' , 'description' => 'Employ technology as a business tool in capturing financial and non-financial information, generating reports and making decisions;'],
            ['shortname' => 'AIS','longname' => 'Bachelor of Science in Accounting Information Systems', 'department' => 'DBE' , 'description' => 'Employ technology as a business tool in capturing financial and non-financial information, generating reports and making decisions;'],
            ['shortname' => 'BEE','longname' => 'Bachelor of Elementary Education','department' => 'DTE' , 'description' => 'Demonstrate in-depth understanding of the diversity of learners in various learning areas.'],
            ['shortname' => 'SEDS','longname' => 'Bachelor of Secondary Education major in Science', 'department' => 'DTE' , 'description' => 'Demonstrate deep understanding of scientific concepts and principles.'],
            ['shortname' => 'SEDM','longname' => 'Bachelor of Secondary Education major in Mathematics', 'department' => 'DTE' , 'description' => 'Exhibit competence in mathematical concepts and procedures.'],
            ['shortname' => 'SEDE','longname' => 'Bachelor of Secondary Education major in English', 'department' => 'DTE' , 'description' => 'Possess broad knowledge of language and literature for effective learning.']
        ];
        foreach($programs as $program){
            Program::create($program);
        }
    }
}
