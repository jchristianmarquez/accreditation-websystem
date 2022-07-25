<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rules\Uppercase;
use Illuminate\Auth\Events\Registered;

class AreaController extends Controller
{
    public function index(){

        $areas = Area::join('publish_statuses','publish_statuses.publishID','=', 'areas.publishStatus')
                            ->get();

        return view('admin/areas',[
            'areas'=>  $areas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'areaNumber' => ['required', 'unique:areas', 'max:255'],
            'areaName' => ['required', 'string', 'max:100'],
        ]);

        // $approvalDirector = null;
        // $approvalQA = null;

        // if($request->approvalType==1){
        //     $approvalDirector = 2;
        //     $approvalQA = 2;
        // }
        // else if($request->approvalType==2){
        //     $approvalDirector = 3;
        //     $approvalQA = 2;
        // }
        // else if($request->approvalType==3){
        //     $approvalDirector = 2;
        //     $approvalQA = 3;
        // }

        $area = Area::create([
            'areaNumber' => $request->areaNumber,
            'areaName' => $request->areaName,
            'publishStatus' => 2,
        ]);

        event(new Registered($area));
        return redirect()->back()->with('status','Area Updated Successfully');
    }
    public function update(Request $request)
    {
        Area::where('areaNumber', $request->areaNumber)
            ->update([
                'areaNumber' => $request->areaNumber,
                'areaName' => $request->areaName,
            ]);

        return redirect()->back()->with('status','Area Updated Successfully');
    }

    public function destroy(Request $request)
    {
        Area::where('areaNumber', $request->areaNumber)->delete();

        return redirect()->back()->with('status','Area Deleted Successfully');
    }
}
