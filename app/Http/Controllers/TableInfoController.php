<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
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

        $programTitle= Program::where('shortname', $program)
            ->value('longname');

        $columnCount = Template::where([
                'area'=>$area,
                'reportType'=>$reportType
            ])
            ->select('columnNumber')->distinct()->get();

        return view('admin/table_info',[
            'program'=>$program,
            'area'=>$area,
            'report'=>$reportType,
            'table_info'=>$table_info,
            'programTitle'=> $programTitle,
            'listOfPrograms' => Program::all(),
            'listOfAreas'=>Area::all(),
            'reportTypes'=>Report::all(),
            'templates'=>  $template,
            'uniqueRows'=>$uniqueRows,
            'columnCount'=>$columnCount
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
        for($index=0; $index<count($request->tblCol); $index++){
            $table_info = TableInfo::create([
                'accred_level' => 1,
                'program' => $request->program,
                'area' => $request->area,
                'reportType' => $request->reportType,
                'tblRow' => $request->tblRow[1],
                'tblCol' => $request->tblCol[$index],
                'cellText' => "<p>".$request->tblRow[1]."</p>"
            ]);
            event(new Registered($table_info));
        }

        return redirect()->back()->with('status','Row Added Successfully');
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
    public function update(Request $request)
    {
        $googleLinkCheck = str_replace("view?usp=sharing","preview",$request->cellText);

        TableInfo::where([
            'accred_level'=>1,
            'program'=>$request->program,
            'area'=>$request->area,
            'reportType'=>$request->reportType,
            'tblRow'=>$request->tblRow,
            'tblCol'=>$request->tblCol,
        ])->update(['cellText'=>$googleLinkCheck]);

        return redirect()->back()->with('status','Cell Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->tblRow);

        //Gets all the records of the row
        $rows= TableInfo::where([
            'accred_level'=>$request->accred_level,
            'program'=>$request->program,
            'area'=>$request->area,
            'reportType'=>$request->reportType,
            'tblRow'=>$request->tblRow
        ]);

        //Gets the record where it's equals to the Accreditation level - Department - Area Level - Report Type
        $urlData = TableInfo::where([
            'accred_level'=>$request->accred_level,
            'program'=>$request->program,
            'area'=>$request->area,
            'reportType'=>$request->reportType,
        ]);
        //Gets the highest row value
        $maxRow= $urlData->max('tblRow');

        // dd($maxRow);
        // dd($maxRow >=$request->tblRow);

        $selectedRow = $request->tblRow;
        $rows->delete();

        // Update all the rows in database if the deleted row is not the last row
        if($maxRow >=$selectedRow){
            while($maxRow >=$selectedRow){
                // dump($selectedRow);
                TableInfo::where([
                    'accred_level'=>$request->accred_level,
                    'program'=>$request->program,
                    'area'=>$request->area,
                    'reportType'=>$request->reportType,
                    'tblRow'=>$selectedRow
                ])->update(['tblRow'=>$selectedRow-1]);
                $selectedRow++;
            }
        }
        return redirect()->back()->with('status','Row Deleted Successfully');
    }
}
