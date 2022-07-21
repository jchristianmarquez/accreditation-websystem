<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Template;
use App\Models\Area;
use App\Models\Report;

class TemplateController extends Controller
{
    public function index($area,$reportType){

        $template = Template::where([
            'area'=>$area,
            'reportType'=>$reportType,
        ])->orderBy('columnNumber')->get();

        return view('admin/template',[
            'area'=>$area,
            'report'=>$reportType,
            'listOfAreas'=>Area::all(),
            'reportTypes'=>Report::all(),
            'templates'=>  $template
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'columnNumber' => ['required', 'integer', 'max:50'],
            'columnName' => ['required', 'string', 'max:100'],
        ]);

        $template = Template::create([
            'accred_level' => 1,
            'area' => $request->area,
            'reportType' => $request->reportType,
            'columnNumber' => $request->columnNumber,
            'columnName' => $request->columnName,
        ]);

        event(new Registered($template));
        return redirect()->back()->with('status','Template Added Successfully');
    }
    public function update(Request $request)
    {
        $template = Template::where([
            'area' => $request->area,
            'reportType' => $request->reportType,
            'columnNumber' => $request->columnNumber
        ])->first();

        $template->columnNumber= $request->input('columnNumber');
        $template->columnName= $request->input('columnName');

        $template->save();

        return redirect()->back()->with('status','Template Updated Successfully');
    }

    public function destroy(Request $request)
    {
        Template::where([
            'area' => $request->area,
            'reportType' => $request->reportType,
            'columnNumber' => $request->columnNumber
        ])->delete();

        return redirect()->back()->with('status','Template Deleted Successfully');
    }
}
