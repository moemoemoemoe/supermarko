<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gpi;
class GpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function save_tracking($email,$lat,$long,$adress)
    {
        
$gpis = new Gpi();
$gpis->email  = $email;
$gpis->lat  = $lat;
$gpis->long  = $long;
$gpis->adress  = $adress;
try {
    $gpis->save();
    return "[{".'"status":'.'"Uploaded Successfully"'."}]"; 
    
} catch (Exception $e) {

    return "[{".'"status":'.'"Error on Save please Try again"'."}]";
}


        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
