<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Territory;
use App\Models\Region;
use App\Models\Zone;
use Validator;
use Response;
use Redirect;
use DB;

class TerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $territories = Territory::all()->toArray();
        $regions = Region::all()->toArray();
        $zones = Zone::all()->toArray();
        return view('territory.index', compact('territories','regions','zones'));
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
        ->where('TABLE_NAME','territories')
        ->get();

        foreach($id as $v_id) {
            $territory_id= $v_id->id;
        }
        $zones = Zone::get(["zone_s_description", "id"]);
        return view('territory.create',compact('territory_id','zones'));
    }

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
        $territory= Territory::find($id);    
        $territory -> delete();
        return redirect()->route('territory.index')->with('success', 'Territory Removed');
    }

    public function fetchRegion(Request $request)
    {
        
        $regions = Region::where("zone_code",$request->zone_id)->get(["region_name", "id"]);
        echo($regions);
        return response()->json($regions);
        
    }
    
}
