<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        return view('user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedData = $request-> validate([
            'first_name'=>'required | max:255',
            'last_name'=>'required | max:255',
            'email_address'=>'required | max:255',
            'mobile_number'=>'required | numeric',
            'address'=>'required | max:255',
            'status'=>'required | max:255',
        ]);
        $users = Users::create($storedData);
        return redirect('users')-> with('Completed','New User has been saved');
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
        $users = Users::findorfail($id);
        return view('edituser', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request-> validate([
            'first_name'=>'required | max:255',
            'last_name'=>'required | max:255',
            'email_address'=>'required | max:255',
            'mobile_number'=>'required | numeric',
            'address'=>'required | max:255',
            'status'=>'required | max:255',
        ]);

       Users::whereId($id)->update($updateData);
        return redirect('users')->with('Updated!','User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::findorfail($id);
        $users->delete();
        return redirect('users')-> with('Deleted.', 'User has been removed');
    }
}
