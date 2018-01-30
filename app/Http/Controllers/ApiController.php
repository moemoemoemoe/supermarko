<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Generic;
use App\Logs;
use App\Item;
use App\Saver;
use App\Sub;
use App\Order;
use App\Customer;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function save_customer($name,$email,$mobile,$adress,$imei,$x,$y,$reg)
    {
        $driver_exist = Customer::where('id_tablet',$imei)->get();
        if(count($driver_exist) > 0)
        {

 return "[{".'"status":'.'"Error this device allready register"'."}]";


        }
        else
        {
$driver = new Customer();
$driver->name = $name;
$driver->phone = $mobile;
$driver->email = $email;
$driver->address = $adress;
$driver->id_tablet = $imei;
$driver->coor_x = $x;
$driver->coor_y = $y;
$driver->reg_id = $reg;

try {
    $driver->save();
    return "[{".'"status":'.'"Uploaded Successfully"'."}]"; 
    
} catch (Exception $e) {

    return "[{".'"status":'.'"Error on Save please Try again"'."}]";
}


        }

    }
    public function get_offers($sty)
    {
        $offers = Offer::select('id','image_url_original','cat_id')->orderBy('id','DESC')->where('sty',$sty)->where('status',1)->get();

        return '{
  "offers":'.$offers.'}';
    }

      public function get_offers_all($sty)
    {
        $offers = Offer::select('id','image_url_original')->orderBy('id','DESC')->where('sty',$sty)->where('status',1)->get();

        return $offers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spec_offer($id)
    {
        $offers = Offer::select('id','title','image_url_original','content','price')->orderBy('id','DESC')->where('cat_id', $id)->where('status',1)->get();
        return $offers;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function single_offer($id)
    {
        $offer =Offer::select('id','title','content','image_url_original','price')->where('id',$id)->get();
        return $offer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_all_generics()
    {
        $generics = Generic::select('id','generic_name','image_url_original','zone_id')->OrderBy('id','ASC')->get();
        return $generics;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        //

        $logs = Logs::select('id','table_id','query')->orderBy('id','DESC')->where('status',1)->get();
        return $logs;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generics_api($zone_id)
    {
       $generics= Generic::select('id','generic_name','image_url_original')->orderBy('id','ASC')->where('zone_id',$zone_id)->get();
       return $generics;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function items_api($zone_id,$generic_id,$lang)
    {

        $items = Item::select('id','name','content','brand_id','has_sub','price','image_url_original','vat')->with('sub_'.$lang)->with('brande')->where('zone_id',$zone_id)->where('generic_id',$generic_id)->get();
        return $items;

    }
    public function get_savers()
    {


        $savers = Saver::orderBy('id','DESC')->where('status',1)->get();

     
  return $savers;
    }

    public function get_subs()
    {


        $subs = Sub::OrderBy('id','DESC')->get();
        return $subs;
    }
     public function single_search($id)
    {
        $search =Sub::where('id',$id)->get();
        return $search;
    }

    public function download($filename)
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() . "/app/downloads/" . $filename;
        $headers = array(
            'Content-Type: apk',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }
    public function get_last_invoice($email)
    {

$customer = Customer::where('email',$email)->get();
$order = Order::where('customer_id',$customer[0]->id)->whereDate('created_at','=',date('Y-m-d'))->OrderBy('id','DESC')->limit(1)->get();
return $order;
        
    }
}
