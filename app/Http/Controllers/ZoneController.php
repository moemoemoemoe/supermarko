<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;
use App\Room;
use Redirect;
use Validator;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zone_index()
    {
        $rooms = Room::orderBy('id','ASC')->get();
        $zones = Zone::with('room')->orderBy('id','Asc')->get();

        return view('admin.home_structure.zones.zone_index',compact('rooms','zones'));
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
    public function zone_index_save(Request $r)
    {
         $room_id = $r->input('room_id');
         $zone_name = $r->input('zone_name');

          $data = ['zone_name' => $zone_name];

            $rules = ['zone_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $zone = new Zone();
                $zone->zone_name = $zone_name;
                $zone->room_id = $room_id;
               
              

                $zone->save();


                return Redirect::back()->with('success', 'Zone successfuly Added');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function zone_index_view($id)
    {
        $rooms = Room::orderBy('id','ASC')->get();
        $zones = Zone::findOrFail($id);

        return view('admin.home_structure.zones.view_zone',compact('rooms','zones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function zone_index_view_save(Request $r,$id)
    {
         $room_id = $r->input('room_id');
         $zone_name = $r->input('zone_name');

          $data = ['zone_name' => $zone_name];

            $rules = ['zone_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               $zones = Zone::findOrFail($id);
                $zones->zone_name = $zone_name;
                $zones->room_id = $room_id;
               
              

                $zones->save();


                return Redirect::back()->with('success', 'Zone successfuly Updated');

    }
        
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
