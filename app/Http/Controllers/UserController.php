<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Region;
use App\Models\Zone;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    =>  'required',
            'nic'     =>  'required',
            'address'    =>  'required',
            'mobile'     =>  'required',
            'email'    =>  'required',
            'gender'     =>  'required',
            'territtory_code'    =>  'required',
            'user_name'    =>  'required',
            'passwords'     =>  'required'
        ]);
        $user = new User([
            'name'    =>  $request->get('name'),
            'nic'     =>  $request->get('nic'),
            'address'    =>  $request->get('address'),
            'mobile'     =>  $request->get('mobile'),
            'email'    =>  $request->get('email'),
            'gender'     =>  $request->get('nic'),
            'territtory_code'    =>  $request->get('territtory_code'),
            'user_name'     =>  $request->get('user_name'),
            'passwords'     =>  $request->get('passwords')
        ]);
        $user->save();
        return redirect()->route('user.create')->with('success', 'User Added');
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
