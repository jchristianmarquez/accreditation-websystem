<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Report;

use Illuminate\Http\Request;

class SelectProgramController extends Controller
{
    public function index($selected_dept){
        $department_info = DB::table('department')
            ->where('shortname', $selected_dept)->get();

        $programs = DB::table('programs')
            ->where('department', $selected_dept)->get();
        $reportTypes = Report::all();

        return view('admin/program_select',[
            'department'=>  $department_info,
            'programs'=>  $programs,
            'reportTypes'=>  $reportTypes
        ]);
    }
}
