<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rules\Uppercase;
use Illuminate\Auth\Events\Registered;

class ProgramController extends Controller
{
    public function index(){

        return view('admin/program',[
            'programs'=>  Program::all(),
            'departments'=>  Department::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'shortname' => ['required', 'string', 'max:255', new Uppercase],
            'longname' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
        ]);


        $program = Program::create([
            'shortname' => $request->shortname,
            'longname' => $request->longname,
            'department' => $request->department,
            'description' => $request->description
        ]);

        event(new Registered($program));
        return redirect()->back()->with('status','Program Updated Successfully');
    }
    public function update(Request $request)
    {
        Program::where('shortname', $request->shortname)
            ->update([
                'shortname' => $request->shortname,
                'department' => $request->department,
                'longname' => $request->longname,
                'description' => $request->description
            ]);

        return redirect()->back()->with('status','Program Updated Successfully');
    }

    public function destroy(Request $request)
    {
        Program::where('shortname', $request->shortname)->delete();

        return redirect()->back()->with('status','Program Deleted Successfully');
    }
}
