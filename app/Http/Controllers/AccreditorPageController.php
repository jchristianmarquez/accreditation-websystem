<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Program;
use App\Models\Area;
use App\Models\Report;

class AccreditorPageController extends Controller
{
    public function index($program,$area, $report){

        $department = Program::where('shortname', $program)->value('department');

        if($department=='DCI'){
            $dept = 'dci-logo';
        }
        else if($department=='DBE'){
            $dept = 'dbe-logo';
        }
        else if($department=='DTE'){
            $dept = 'dte-logo';
        }

        $deptTitle = Department::where('shortname',$department)->value('longname');

        return view('accreditor-page',[
            'program' => $program,
            'area' => $area,
            'dept' => $dept,
            'report' => $report,
            'programs' => Program::all(),
            'reportTypes' => Report::all(),
            'deptTitle' => $deptTitle,
            'areaList' => Area::all()
        ]);
    }

    public function landingPage(){
        return view('accreditor-landing',[
            'programs' => Program::all(),
            'departments' => Department::all(),
            'reportTypes' => Report::all()
        ]);
    }
}
