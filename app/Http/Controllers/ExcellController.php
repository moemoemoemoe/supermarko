<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Excell;
use App\Fakeitem;
use App\Sub;
use App\Item;
class ExcellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
       $path = "excell/abcd.xls";
      // return $path;

 
$exc = Excel::load($path)->get();
     

$data = '{"data":'.$exc.'}';

  
 $user = json_decode($data);
        try{
            
 //return $user->data;

            foreach($user->data as $mydata)

            { 
                $exl =  new Sub();
                $exl->name_sub =  $mydata->item ; 
                $exl->price =  $mydata->price ; 
                $exl->content =  $mydata->item ; 
                $exl->status =  0; 
               
                $exl->img_name =  $mydata->image ; 
                $exl->image_url_original =  config('app.my_url_child').$mydata->image ; 
                $exl->item_id = $mydata->item_id ; 
                $exl->save();
                //echo $mydata->item."<hr/>";
            }
        } catch(\Exception $e){

         return "[{".'"status":'.'"Error Please try again"'."}]";
     }
                       
      

}

 public function olddata(Request $request)
    {
       $path = "excell/abcd.xls";
      // return $path;

 
$exc = Excel::load($path)->get();
     

$data = '{"data":'.$exc.'}';

  
 $user = json_decode($data);
        try{
            
 //return $user->data;

            foreach($user->data as $mydata)

            { 
                $exl =  new Excell();
                $exl->name =  $mydata->item ; 
                $exl->brand_id =  $mydata->brand_id ; 
                $exl->price =  $mydata->price ; 
                $exl->room_id =  $mydata->room_id ; 
                $exl->zone_id =  $mydata->zone_id ; 
                $exl->generic_id =  $mydata->generic_id ; 
                $exl->image =  $mydata->image ; 
                $exl->url =  config('app.my_url_child').$mydata->image ; 
                $exl->item_id = $mydata->item_id ; 
                $exl->save();
                //echo $mydata->item."<hr/>";
            }
        } catch(\Exception $e){

         return "[{".'"status":'.'"Error Please try again"'."}]";
     }
                       
      

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_fake_item()
    {
   
        
         $exla = Excell::get();

        for($i=0;$i<count($exla);$i++)
        {
            if($i==0)
            {

            $fake = new Item();
            $fake->id = $exla[$i]->item_id;
            $fake->name = $exla[$i]->name;
            $fake->content = $exla[$i]->name;
            $fake->room_id = $exla[$i]->room_id;
            $fake->zone_id = $exla[$i]->zone_id;
            $fake->generic_id = $exla[$i]->generic_id;
            $fake->brand_id = $exla[$i]->brand_id;
            $fake->has_sub = 1;
            $fake->price = $exla[$i]->price;
            $fake->status = 0;
            $fake->img_name = $exla[$i]->image;
            $fake->image_url_original = config('app.my_url_items').$exla[$i]->image;

$fake->save();
            }
            else{

            $id=$exla[$i]->item_id;
            if($id == $exla[$i-1]->item_id)
{}
        else{

            $fake = new Item();
            $fake->id = $exla[$i]->item_id;
            $fake->name = $exla[$i]->name;
            $fake->content = $exla[$i]->name;
            $fake->room_id = $exla[$i]->room_id;
            $fake->zone_id = $exla[$i]->zone_id;
            $fake->generic_id = $exla[$i]->generic_id;
            $fake->brand_id = $exla[$i]->brand_id;
            $fake->has_sub = 1;
            $fake->price = $exla[$i]->price;
            $fake->status = 0;
            $fake->img_name = $exla[$i]->image;
            $fake->image_url_original = config('app.my_url_items').$exla[$i]->image;

$fake->save();
}

        }
    }
     
      

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
