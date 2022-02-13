<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Zone;
use DB;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all()->toArray();
        $zones = Zone::all()->toArray();
        return view('region.index', compact('regions','zones'));
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
        ->where('TABLE_NAME','regions')
        ->get();

        foreach($id as $v_id) {
            $region_id= $v_id->id;
        }	
        
  
        return view('region.create',compact('region_id'));
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
            'region_name'    =>  'required',
            'zone_code'     =>  'required'
        ]);
        $region = new Region([
            'region_name'    =>  $request->get('region_name'),
            'zone_code'     =>  $request->get('zone_code')
        ]);
        $region->save();
        return redirect()->route('region.index')->with('success', 'Region Added');
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
        $region = Region::find($id);
        return view('region.edit', compact('region','id'));
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
            'region_name'    =>  'required',
            'zone_code'     =>  'required'
        ]);
        $region = Region::find($id);
        $region->region_name = $request->get('region_name');
        $region->zone_code = $request->get('zone_code');
        $region->save();
        return redirect()->route('region.index')->with('success', 'Region Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region= Region::find($id);    
        $region -> delete();
        return redirect()->route('region.index')->with('success', 'Region Removed');
    }
}
