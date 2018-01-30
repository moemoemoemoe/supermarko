<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Driver;
use Redirect;
use App\Order;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_index()
    {
            $customers =Customer::orderBy('id','DESC')->get();
            $drivers = Driver::OrderBy('id','DESC')->get();

        return view('admin.customers.index',compact('customers','drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publish_driver($id)
    {
        $driver = Driver::findOrFail($id);
     if($driver->status == '0')
     {
       $driver->status = '1';
       $driver->save();
       return Redirect::Back()->with('success', 'This driver is Published');
     }
     else{
      $driver->status = '0';
      $driver->save();
      return Redirect::Back()->with('success', 'This driver is Unpublished');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_driver_report($id)
    {
         
       $carts = Order::Orderby('id','DESC')->whereDate('created_at','=',date('Y-m-d'))->where('driver_id',$id)->with('driver')->get();
       //return $carts;
       return view('admin.offers.cart_offer_buy',compact('carts'));
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
