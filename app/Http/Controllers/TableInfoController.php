<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Area;
use App\Models\Report;
use App\Models\Program;
use App\Models\TableInfo;

class TableInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($program,$area,$reportType)
    {
        $template = Template::where([
            'area'=>$area,
            'reportType'=>$reportType,
        ])->orderBy('columnNumber')->get();

        $uniqueRows = TableInfo::where([
            'program'=>$program,
            'area'=>$area,
            'reportType'=>$reportType,
        ])->select('tblRow')
        ->distinct()->get();

        $table_info = TableInfo::orderBy('tblCol')
        ->where([
            'program'=>$program,
            'area'=>$area,
            'reportType'=>$reportType
        ])->get();

        return view('admin/table_info',[
            'area'=>$area,
            'report'=>$reportType,
            'table_info'=>$table_info,
            'listOfPrograms' => Program::all(),
            'listOfAreas'=>Area::all(),
            'reportTypes'=>Report::all(),
            'templates'=>  $template,
            'uniqueRows'=>$uniqueRows
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
