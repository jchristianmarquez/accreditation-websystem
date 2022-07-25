<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('account_settings',[
            'accountsettings'=> User::find($user)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accountsettings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\Account\storeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $account = User::create([
            'fullname' => $request->fullname,
            'department' => $request->department,
            'position' => $request->position,
            'email' => $request->email,
            'newpassword' => $request->newpassword,

        ]);

        event(new Registered($account));
        return redirect('account_settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $account = Auth::user();
        $account = User::find($account->id);
        $account->name= $request->input('fullname');
        $account->department= $request->input('department');
        $account->position= $request->input('position');
        $account->email= $request->input('email');
        $account->save();


        return redirect()->back()->with('status','Account Updated Successfully');
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
