<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generic;
use App\Zone;
use App\Brande;
use App\Item;
use App\Sub;

use Session;
class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function demo_index()
    {
      
         Session::forget('z_id');
         Session::forget('g_id');
        return view('admin.demo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function demo_get_generic($zone_id)
    {
         Session::forget('z_id');
         Session::forget('g_id');
         Session::put('z_id',$zone_id);
        $generics= Generic::orderBy('id','ASC')->where('zone_id',$zone_id)->get();
        return view('admin.demo.generics_view',compact('generics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function brande_view_by_generic($generic_id)
    {

Session::put('g_id',$generic_id);
$items = Item::with('sub')->with('brande')->where('zone_id',Session::get('z_id'))->where('generic_id',$generic_id)->get();
//$items_others = Item::with('brande')->where('room_id',1)->where('zone_id',Session::get('z_id'))->where('generic_id',$generic_id)->where('brand_id','=',19)->get();
return $items;

       // $brandes= Brande::orderBy('id','ASC')->where('generic_id',$generic_id)->get();
       
        return view('admin.demo.item_view',compact('items','items_others'));
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item_view_domo($brande_id)
    {
        $items = Item::orderBy('id','DESC')->where('brand_id',$brande_id)->where('generic_id',Session::get('g_id'))->get();
        return view('admin.demo.item_view',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function child_view_domo($item_id)
    {
         $childs = Sub::orderBy('id','DESC')->where('item_id',$item_id)->get();
        return view('admin.demo.child_view',compact('childs'));
    
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
