<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserSettingController extends Controller
{
    public function index()
    {
        return view('/admin/user-setting',[
            'users'=> User::all(),
            'departments'=> Department::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);


        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'department' => $request->department,
            'position' => $request->position,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('status','User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('tables.user-settings',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::find($id);
        // return view('tables.user-settings', compact('user'));
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
        $user = User::find($request->input('id'));
        $user->name= $request->input('name');
        $user->department= $request->input('department');
        $user->position= $request->input('position');
        $user->email= $request->input('email');

        $user->save();


        return redirect()->back()->with('status','User Updated Successfully');
        // return $request->input();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $user = User::find($request->input('id'));
       $user ->delete();
       return redirect()->back()->with('status','User Deleted Successfully');
    }
}
