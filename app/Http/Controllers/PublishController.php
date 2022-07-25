<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publish;
use App\Models\TableInfo;
use App\Models\Area;
use App\Models\Report;

class PublishController extends Controller
{
    public function index($area,$report){

        $areaTitle = Area::where('areaNumber', $area)->value('areaName');
        $listOfRow = TableInfo::where('area', $area,)->where('reportType', $report)->select('tblRow','program','reportType')->distinct('tblRow')->get();
        $listOfComments = Publish::where('area', $area,)->where('reportType', $report)->get();

        return view('comment-publish',[
            'area' => $area,
            'areaTitle'=> $areaTitle,
            'report' => $report,
            'listOfAreas'=>Area::all(),
            'reportTypes'=>Report::all(),
            'comments' => Publish::all(),
            'listOfRow' => $listOfRow,
            'listOfComments' => $listOfComments
        ]);

    }

    public function store(Request $request){
        Publish::create([
            'accred_level' => 1,
            'program' => $request->program,
            'area' => $request->area,
            'reportType' => $request->reportType,
            'tblRow' => $request->tblRow,
            'comment' => $request->comment,
            'edited_by' => $request->editedBy,
            'approval' => 2
        ]);
        return redirect()->back()->with('status','Comment Added Successfully');
    }

    public function update(){

    }

    public function destroy(Request $request){

        dd($request);
        $comment= Publish::where([
            'accred_level'=>$request->accred_level,
            'program'=>$request->program,
            'area'=>$request->area,
            'reportType'=>$request->reportType,
            'tblRow'=>$request->tblRow,
            'comment'=>$request->comment
        ]);

    }
}
