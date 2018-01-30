<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Validator;
use Redirect;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function room_index()
    {
        $rooms = Room::OrderBy('id',"ASC")->get();
        return view('admin.home_structure.rooms.room_index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function room_index_upload(Request $r)
    {
        
            $room_name = $r->input('room_name');


         

            $data = ['room_name' => $room_name];

            $rules = ['room_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $room = new Room();
                $room->room_name = $room_name;
               
              

                $room->save();


                return Redirect::back()->with('success', 'New Room successfuly created');


            }
    }

  
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function room_index_view($id)
    {
        $rooms = Room::findOrFail($id);
        return view('admin.home_structure.rooms.view_room',compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function room_index_view_save(Request $r ,$id)
    {
          $room_name = $r->input('room_name');


         

            $data = ['room_name' => $room_name];

            $rules = ['room_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $room = Room::findOrFail($id);
                $room->room_name = $room_name;
               
              

                $room->save();


                return Redirect::back()->with('success', 'Room successfuly Updated');

    }}

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
