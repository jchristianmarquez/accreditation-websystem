<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rules\Uppercase;
use Illuminate\Auth\Events\Registered;

class DepartmentController extends Controller
{
    public function index(){

        return view('admin/department',[
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


        $department = Department::create([
            'shortname' => $request->shortname,
            'longname' => $request->longname,
            'description' => $request->description

        ]);

        event(new Registered($department));
        return redirect()->back()->with('status','Department Added Successfully');
    }
    public function update(Request $request)
    {
        Department::where('shortname', $request->shortname)
            ->update([
                'shortname' => $request->shortname,
                'longname' => $request->longname,
                'description' => $request->description
            ]);

        return redirect()->back()->with('status','Department Updated Successfully');
    }

    public function destroy(Request $request)
    {
        Department::where('shortname', $request->shortname)->delete();

        return redirect()->back()->with('status','Department Deleted Successfully');
    }
}
