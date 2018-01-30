<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Zone;
use App\Generic;
use App\Brande;
use Validator;
use Redirect;

class ShowIdController extends Controller
{
    public function show_zone(Request $r)
    {
      $id = $r->input('id_room');
      //return $id;
      $zones =Zone::select('id','zone_name')->where('room_id',$id)->get();
      $response = json_decode($zones, true);
      
      return $response;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_generic(Request $r)
    {
      $id = $r->input('id_zone');
      //return $id;
      $generics =Generic::select('id','generic_name')->where('zone_id',$id)->get();
      $response = json_decode($generics, true);
      
      return $response;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_brande(Request $r)
    {
      //$id = $r->input('id_generic');
      //return $id;
      $brandes =Brande::select('id','brande_name')->get();
      $response = json_decode($brandes, true);
      
      return $response;

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
