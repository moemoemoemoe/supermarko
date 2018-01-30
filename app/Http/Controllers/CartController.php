<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use response;
use App\Customer;
use App\Driver;
use App\Order;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//{"data":[{"Id":11,"qty":1},{"Id":13,"qty":4}]}
    public function get_cart($data,$userid,$em,$ad,$phone,$tab,$x,$y,$date,$time,$cmnt,$regid)
    { 
    $inv_last = Cart::OrderBy('id','DESC')->limit(1)->get();
    

       $customers = Customer::where('email',$em)->get();
        $order = new Order();
        $order->inv_id = $inv_last[0]->original_invoice + 1;
        $order->driver_id =0 ;
        $order->status = 0 ;
        $order->customer_id = $customers[0]->id;
        $order->role = "X";
        $order->save();


    
   
       
     $invoice_number = mt_rand(111111,999999);
        $user = json_decode($data);
        try{
            
          

            foreach($user->data as $mydata)

            { 


               $cart = new Cart();
               $cart->offer_id = $mydata->Id;
               $cart->qty = $mydata->qty;
               $cart->idoffer = $mydata->Id;
               $cart->iduser = $userid;
               $cart->email = $em;
               $cart->invnum = $inv_last[0]->invnum + 1;
               $cart->type = $mydata->type;
               $cart->parent = $mydata->parent;
               $cart->original_invoice =$inv_last[0]->original_invoice + 1;
               $cart->date =  $date;
               $cart->time = $time;
               $cart->comment =  $cmnt;

               $cart->status =  0;


               $cart->save();
           }   

           return "[{".'"status":'.'"Uploaded Successfully"'."}]";   
       }  
       catch(\Exception $e){

         return "[{".'"status":'.'"Error Please try again"'."}]";
     }

 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function get_cart_post(Request $r,$userid,$em,$ad,$phone,$tab,$x,$y,$date,$time,$cmnt,$regid)
    // { 
// $data =  $r->file('uploaded_file');
// if($r->hasFile('uploaded_file'))
// {

//    echo "success"+$em;
    
// }
// else{
//         echo "fail"+$date;
//         }
// $data = "{"data":[{"Id":82,"qty":1,"type":3,"parent":1114328},{"Id":81,"qty":1,"type":3,"parent":1114327},{"Id":78,"qty":1,"type":3,"parent":1114325},{"Id":79,"qty":1,"type":3,"parent":1114326},{"Id":80,"qty":1,"type":3,"parent":1114326}]}";

//     $inv_last = Cart::OrderBy('id','DESC')->limit(1)->get();
    
//  $carts = Cart::orderBy('id','DESC')->where('email',$em)->limit(1)->get();
//      if(count($carts) == 0){ 
// $customer = new Customer();
// $customer->name = $userid ;
// $customer->email = $em ;
// $customer->phone =  $phone;
// $customer->address =  $ad;
// $customer->id_tablet =  $tab;
// $customer->coor_x =  $x;
// $customer->coor_y = $y;
// $customer->reg_id = $regid;
// $customer->save();
//       }
//        $customers = Customer::where('email',$em)->get();
//         $order = new Order();
//         $order->inv_id = $inv_last[0]->original_invoice + 1;
//         $order->driver_id =0 ;
//         $order->status = 0 ;
//         $order->customer_id = $customers[0]->id;
//         $order->role = "X";
//         $order->save();


    
   
       
//      $invoice_number = mt_rand(111111,999999);
//         $user = json_decode($data);
//         try{
            
          

//             foreach($user->data as $mydata)

//             { 


//                $cart = new Cart();
//                $cart->offer_id = $mydata->Id;
//                $cart->qty = $mydata->qty;
//                $cart->idoffer = $mydata->Id;
//                $cart->iduser = $userid;
//                $cart->email = $em;
//                $cart->invnum = $inv_last[0]->invnum + 1;
//                $cart->type = $mydata->type;
//                $cart->parent = $mydata->parent;
//                $cart->original_invoice =$inv_last[0]->original_invoice + 1;
//                $cart->date =  $date;
//                $cart->time = $time;
//                $cart->comment =  $cmnt;

//                $cart->status =  0;


//                $cart->save();
//            }   

//            return "[{".'"status":'.'"Uploaded Successfully"'."}]";   
//        }  
//        catch(\Exception $e){

//          return "[{".'"status":'.'"Error Please try again"'."}]";
//      }

    // /}
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
