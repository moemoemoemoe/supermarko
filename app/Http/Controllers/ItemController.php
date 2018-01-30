<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Item;
use App\Sub;
use Redirect;
use Validator;
    use Response;
    use paginate;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item_index()
    {
        $rooms = Room::orderBy('id','ASC')->get();
        return view('admin.items.item_index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item_index_save(Request $r)
    {        
//         $items_name = $r->input('item_child');
//         $item_prices = $r->input('price_child');
//         $photos = $r->file('photo_child');
//         $content = $r->input('content_child');
//         for($i=0;$i<count($names);$i++)
//         {
// if(empty($names[$i]) || empty($prices[$i]) || empty($photos[$i]) || empty($content[$i]))
// {

//   echo "hahhaha";
// }
// else
// {
//     echo "fi fi fi";
// }

//         }
  $foreign_name = mt_rand(111111,999999);
       $vat = $r->input('vat');

        $item_name = $r->input('item_name'); 
        $item_content = $r->input('content_item');
        $item_room = $r->input('room_id');
        $item_zone = $r->input('zone_id');
        $item_generic = $r->input('generic_id');
        $item_brande = $r->input('brande_id');
        $item_photo = $r->file('photo');
        $item_price = $r->input('original_price');

        $shild_name = $r->input('item_child');
        $child_price = $r->input('price_child');
        $child_photo = $r->file('photo_child');
        $child_content = $r->input('content_child');

if($item_room == -1 || $item_zone == -1 || $item_generic == -1)
{
      return redirect::route('item_index')->withErrors("Home Structure missing");
}

  $data = ['item_name' => $item_name,'photo'=> $item_photo, 'content_item' => $item_content,'brande_id'=>$item_brande];

            $rules = ['item_name' => 'required' ,'content_item' => 'required','photo'=> 'required','brande_id' => 'required'];

            $v = Validator::make($data, $rules);
             if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }
            else
            {
                $destination = 'uploads/items';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$item_photo->getClientOriginalExtension();
                $item_photo->move($destination, $photo_name);

$item = new Item();
 $item->name = $item_name ;
 $item->content =  $item_content;
 $item->room_id =  $item_room;
 $item->zone_id =  $item_zone;
 $item->generic_id = $item_generic;
 $item->brand_id = $item_brande;
 $item->img_name = $photo_name;
  $item->status = 0;
  $item->vat = $vat;
 $item->image_url_original =  config('app.my_url_items').$photo_name;
if(!empty($item_price))
{
  if($vat == 0)
  {
$item->price = $item_price;
}else{$item->price = $item_price + $item_price*0.11;}
$item->has_sub = 0;
$item->save();
return Redirect::back()->with('success', 'New Item successfuly created');


}else{

$item->price = 0;
$item->has_sub = 1;

for($i=0;$i<count($shild_name);$i++)
     {
if(empty($shild_name[$i]) || empty($child_price[$i]) || empty($child_photo[$i]) || empty($child_content[$i]))
 {
    unlink('uploads/items/'.$photo_name);
return Redirect::Back()->withErrors("this has  no child or some field created is empty");
 }
 else
 {
    $item->save();
      $foreign_namea = mt_rand(111111,999999);
$destination = 'uploads/items/childs';
                $photo_namea = str_replace(' ', '_', $foreign_namea);
                $photo_namea .= '.'.$child_photo[$i]->getClientOriginalExtension();
                $child_photo[$i]->move($destination, $photo_namea);
$subs =  new Sub();
$subs->name_sub = $shild_name[$i];
if($vat == 0)
{
$subs->price = $child_price[$i];
}else{$subs->price = $child_price[$i]+ $child_price[$i]*0.11 ;}
$subs->item_id =  $item->id;
$subs->status = 0;
$subs->img_name = $photo_namea;
$subs->image_url_original = config('app.my_url_child').$photo_namea;
$subs->content = $child_content[$i];

$subs->save();
}

}
return Redirect::back()->with('success', 'New Item successfuly created');

}

            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function item_manage()
    {
        $items = Item::orderBy('id','DESC')->paginate(21);
        return view('admin.items.item_manage',compact('items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function child_index_view($id)
    {
        $childs = Sub::orderBy('id','DESC')->where('item_id',$id)->get();
        return view('admin.items.child_index_view',compact('childs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function child_index_view_update($id)
    {
        $child = Sub::findOrFail($id);
        //return $child;
        return view('admin.items.child_index_view_update',compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function child_index_view_update_save(Request $r, $id)
    {
         $foreign_name = mt_rand(111111,999999);
        $sub_title = $r->input('sub_title');
        $sub_content =$r->input('sub_content');
        $photo = $r->file('photo');
        $price = $r->input('price');

        $data = ['sub_title' => $sub_title,'sub_content' =>$sub_content, 'price' =>$price];

        $rules = ['sub_title' => 'required','sub_content' => 'required','price' => 'required' ];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
          if($r->hasFile('photo')){
            $destination = 'uploads/items/childs';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
        }
        $child = Sub::findOrFail($id);
        $child->name_sub = $sub_title;
        $child->content = $sub_content;
        $child->price = $price;

        if($r->hasFile('photo')){
            unlink('uploads/items/childs/'.$child->img_name);
            $child->img_name = $photo_name;

            $child->image_url_original = config('app.my_url_child').$photo_name;
        }


        $child->save();


        return Redirect::back()->with('success', 'New Item successfuly Updated');


    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item_view_no_child($id)
    {
        $item = Item::findOrFail($id);
        //return $child;
        return view('admin.items.item_view_no_child',compact('item'));
    }
     public function   item_view_no_child_delete($id)
    {
   $item = Item::findOrFail($id);
      $item->delete();
      return Redirect::back()->with('success' , 'Item was Deleted successfuly!!');



     
        //return $child;
       
    }

  

    public function item_view_no_child_save(Request $r, $id)
    {
       $foreign_name = mt_rand(111111,999999);
        $sub_title = $r->input('sub_title');
        $sub_content =$r->input('sub_content');
        $photo = $r->file('photo');
        $price = $r->input('price');

        $data = ['sub_title' => $sub_title,'sub_content' =>$sub_content, 'price' =>$price];

        $rules = ['sub_title' => 'required','sub_content' => 'required','price' => 'required' ];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
          if($r->hasFile('photo')){
            $destination = 'uploads/items';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
        }
        $child = Item::findOrFail($id);
        $child->name = $sub_title;
        $child->content = $sub_content;
        $child->price = $price;

        if($r->hasFile('photo')){
            unlink('uploads/items/'.$child->img_name);
            $child->img_name = $photo_name;

            $child->image_url_original = config('app.my_url_items').$photo_name;
        }


        $child->save();


        return Redirect::back()->with('success', 'New Item successfuly Updated');


    }
    }
    public function update_the_item(Request $r)
    {
$id = $r->input('id_item');
$name = $r->input('item_name');
try{
$item = Item::findOrFail($id);
$item->name = $name;
$item->save();
 $status = 1;
            $message = 'Item successfuly Updated';
}  catch(\Exception $e){
 $status = -1;
            $message = 'Try  again';
     }

 return Response::json(['status' => $status, 'message' => $message]);
    }

    

    public function search_item(Request $r)
    {
        
         $keyword = $r->input('keyword');
          $data = ['keyword' => $keyword];

        $rules = ['keyword' => 'required'];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
            $items = Item::where('name',"LIKE","%$keyword%")->paginate(20);

          return view('admin.items.item_manage',compact('items'));



        }



    }
    public function child_index_view_add_new(Request $r,$item_id)
    {

        $item_child = $r->input('item_child');
        $price_child = $r->input('price_child');
        $child_photo = $r->file('child_photo');
        $content_item = $r->input('content_item');

         $data = ['item_child' => $item_child,'price_child' =>$price_child, 'content_item' =>$content_item,'child_photo'=>$child_photo];

        $rules = ['item_child' => 'required','price_child' => 'required','content_item' => 'required','child_photo'=>'required'];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
$foreign_namea = mt_rand(111111,999999);
$destination = 'uploads/items/childs';
                $photo_namea = str_replace(' ', '_', $foreign_namea);
                $photo_namea .= '.'.$child_photo->getClientOriginalExtension();
                $child_photo->move($destination, $photo_namea);

           $subs =  new Sub();
$subs->name_sub = $item_child;
$subs->price = $price_child;
$subs->item_id =  $item_id;
$subs->status = 0;
$subs->img_name = $photo_namea;
$subs->image_url_original = config('app.my_url_child').$photo_namea;
$subs->content = $content_item;

$subs->save();
return Redirect::back()->with('success', 'New Child successfuly created');
        }


    }

    public function child_index_view_delete($id)
    {
$sub = Sub::findOrFail($id);
      $sub->delete();
      return Redirect::back()->with('success' , 'Child was Deleted successfuly!!');


    }
}
