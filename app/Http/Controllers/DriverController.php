<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Order;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function push($id)
    {

        $driver = Driver::where('id',$id)->get();
        //return $driver[0]->name;

$title = 'Hello '.$driver[0]->name;
$message = 'Message for : '.$driver[0]->name;


         error_reporting(-1);
        ini_set('display_errors', 'On');

         $res = array();
           $payload = array();
        $payload['team'] = 'Hamieh';
        $payload['score'] = '1991';

         
        $res['data']['title'] = $title;
        $res['data']['is_background'] = FALSE;
        $res['data']['message'] = $message;
        $res['data']['image'] = 'http://api.androidhive.info/images/minion.jpg';
        $res['data']['payload'] = $payload;
        $res['data']['timestamp'] = date('Y-m-d G:i:s');


// return $res;
        $to = $driver[0]->reg_id;
       
       $fields = array(
            'to' => $to,
            'data' => $res,
        );
        $api_key = 'AAAAk_ZIjvo:APA91bHCeVT1_EjwqZufv5qpxb2fbi-m2CguR47HwSOVLGOFZCoaAqvm_Ox0QyjeG_XQbsm3aFB8ZQcR8gf1ZfArn2vdttZBHcC021_A1pQmwFFDDEnqNs7JDkP8XEBeb_hxzSfsAqWI';
        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = array(
            'Authorization: key='.$api_key,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        return $result;


    }



    public function save_driver($name,$mobile,$email,$password,$imei,$reg)
    {
        $driver_exist = Driver::where('imei',$imei)->get();
        if(count($driver_exist) > 0)
        {

 return "[{".'"status":'.'"Error this device allready register"'."}]";


        }
        else
        {
$driver = new Driver();
$driver->name = $name;
$driver->mobile = $mobile;
$driver->email = $email;
$driver->password = $password;
$driver->imei = $imei;
$driver->reg_id = $reg;

try {
    $driver->save();
    return "[{".'"status":'.'"Uploaded Successfully"'."}]"; 
    
} catch (Exception $e) {

    return "[{".'"status":'.'"Error on Save please Try again"'."}]";
}


        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_cart_offer_spec_push(Request $r,$inv)
    {
        $orders = Order::where('inv_id',$inv)->get();
        $id = $orders[0]->id;
      //  return $id;

$driver_id = $r->input('driver_id');
$role = $r->input('role');
$order = Order::findOrFail($id);
$order->driver_id = $driver_id;
$order->role = $role;
$order->status = 1;
$order->save();

 $driver = Driver::where('id',$driver_id)->get();
        //return $driver[0]->name;

$title = 'New Order For: '.$driver[0]->name;
$message = 'You have a new order to :'.$role;


         error_reporting(-1);
        ini_set('display_errors', 'On');

         $res = array();
           $payload = array();
        $payload['team'] = 'Hamieh';
        $payload['score'] = '1991';

         
        $res['data']['title'] = $title;
        $res['data']['is_background'] = TRUE;
        $res['data']['message'] = $message;
        $res['data']['image'] = 'http://api.androidhive.info/images/minion.jpg';
        $res['data']['payload'] = $payload;
        $res['data']['timestamp'] = date('Y-m-d G:i:s');


// return $res;
        $to = $driver[0]->reg_id;
       
       $fields = array(
            'to' => $to,
            'data' => $res,
        );
        $api_key = 'AAAAk_ZIjvo:APA91bHCeVT1_EjwqZufv5qpxb2fbi-m2CguR47HwSOVLGOFZCoaAqvm_Ox0QyjeG_XQbsm3aFB8ZQcR8gf1ZfArn2vdttZBHcC021_A1pQmwFFDDEnqNs7JDkP8XEBeb_hxzSfsAqWI';
        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = array(
            'Authorization: key='.$api_key,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

       // return $result;






return redirect()->route('view_cart_offer');


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
