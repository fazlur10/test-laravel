<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use DB;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::all()->toArray();
        return view('zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id= DB::table('INFORMATION_SCHEMA.TABLES')
        ->select('AUTO_INCREMENT as id')
        ->where('TABLE_SCHEMA','laravel_test')
        ->where('TABLE_NAME','zones')
        ->get();

        foreach($id as $v_id) {
            $zone_id= $v_id->id;
        }	
        
  
        return view('zone.create',compact('zone_id'));
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
            'zone_l_description'    =>  'required',
            'zone_s_description'     =>  'required'
        ]);
        $zone = new Zone([
            'zone_l_description'    =>  $request->get('zone_l_description'),
            'zone_s_description'     =>  $request->get('zone_s_description')
        ]);
        $zone->save();
        return redirect()->route('zone.index')->with('success', 'Zone Added');
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
        $zone = Zone::find($id);
        return view('zone.edit', compact('zone','id'));
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
        $this-> validate($request,[
            'zone_l_description'    =>  'required',
            'zone_s_description'     =>  'required'
        ]);
        $zone = Zone::find($id);
        $zone->zone_l_description = $request->get('zone_l_description');
        $zone->zone_s_description = $request->get('zone_s_description');
        $zone->save();
        return redirect()->route('zone.index')->with('success', 'Zone Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone= Zone::find($id);    
        $zone -> delete();
        return redirect()->route('zone.index')->with('success', 'Zone Removed');
    }
}
