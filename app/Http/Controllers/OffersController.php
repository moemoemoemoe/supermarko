<?php
namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Offer;
    use Redirect;
    use Validator;
    use config;
    use Response;
    use App\Cart;
    use App\Driver;
    use App\Order;

    class OffersController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function add_offer()
        {

            return view('admin.offers.offer_add');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function add_offer_save(Request $r)
        {
            // $input = $r->all();
            // return $input;
            $foreign_name = mt_rand(111111,999999);
            $title = $r->input('title');
            $content = $r->input('content');
            $category = $r->input('cat_id');
            $price = $r->input('price');
             $type_id = $r->input('type_id');


            $photo = $r->file('photo');

            $data = ['title' => $title,'content'=> $content, 'cat_id' => $category,'photo' => $photo,'price' => $price];

            $rules = ['title' => 'required' ,'content' => 'required','cat_id' => 'required','photo'=> 'required','price' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $destination = 'uploads/offers';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$photo->getClientOriginalExtension();
                $photo->move($destination, $photo_name);

                $offer = new Offer();
                $offer->title = $title;
                $offer->content = $content;
                $offer->cat_id = $category;
                $offer->img_name = $photo_name;

                $offer->image_url_original = config('app.my_url').$photo_name;
                $offer->status = 0;
                $offer->price = $price;
                $offer->sty = $type_id;

                $offer->save();


                return Redirect::back()->with('success', 'New Offer successfuly created');


            }
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function manage_offer()
        {
            $offers = Offer::orderBy('id','DESC')->get();
            return view('admin.offers.manage_offer_index',compact('offers'));
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function publish_offer($id)
        {
             $offer = Offer::findOrFail($id);
     if($offer->status == '0')
     {
       $offer->status = '1';
       $offer->save();
       return Redirect::Back()->with('success', 'This offer is Published');
     }
     else{
      $offer->status = '0';
      $offer->save();
      return Redirect::Back()->with('success', 'This offer is Unpublished');
    }
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function view_offer($id)
        {
             $offers = Offer::findOrFail($id);
    
           return view('admin.offers.view_offer',compact('offers'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function view_offer_update(Request $r, $id)
        {
             $foreign_name = mt_rand(111111,999999);
            $title = $r->input('title');
            $content = $r->input('content');
            $price = $r->input('price');
          $category = $r->input('cat_id');

            $photo = $r->file('photo');

            $data = ['title' => $title,'content'=> $content,'price' => $price];

            $rules = ['title' => 'required' ,'content' => 'required','price' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                  if($r->hasFile('photo')){
                $destination = 'uploads/offers';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$photo->getClientOriginalExtension();
                $photo->move($destination, $photo_name);
}
                $offer = Offer::findOrFail($id);
                $offer->title = $title;
                $offer->content = $content;
                if($r->hasFile('photo')){
                    unlink('uploads/offers/'.$offer->img_name);
                $offer->img_name = $photo_name;

                $offer->image_url_original = config('app.my_url').$photo_name;
               }
                $offer->price = $price;
                  $offer->cat_id = $category;

                $offer->save();


                return Redirect::back()->with('success', 'New Offer successfuly Updated');


            }
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function delete_offer(Request $r)
        {
            $id = $r->input('id_offer');
            //return $id;
             $check = Offer::where('id', $id)->count();
        if($check == 1){
            $offer = Offer::findOrFail($id);
            unlink('uploads/offers/'.$offer->img_name);
            $offer->delete();
            $status = 1;
            $message = 'Offer successfuly removed';

        }else{
            $status = -1;
            $message = 'Offer doesn\'t exist anymore';
        }
        return Response::json(['status' => $status, 'message' => $message]);

        }
        public function view_cart_offer()
        {
       $carts = Order::Orderby('id','DESC')->whereDate('created_at','=',date('Y-m-d'))->with('driver')->get();
       //return $carts;
       return view('admin.offers.cart_offer_buy',compact('carts'));

        }
         public function view_cart_offer_spec($invm)
        {
$order_status = Order::where('inv_id',$invm)->get();
    $drivers = Driver::orderBy('id','DESC')->where('status',1)->get();
    $thetotalall = 0;
       $carts_offer = Cart::with('offer')->orderBy('id','DESC')->where('original_invoice',$invm)->where('type',1)->get();
        $carts_item = Cart::with('item')->orderBy('id','DESC')->where('original_invoice',$invm)->where('type',2)->get();
         $carts_sub_item = Cart::with('child')->orderBy('id','DESC')->where('original_invoice',$invm)->where('type',3)->get();
         $user_name = Cart::select('iduser','email','the_date','the_time','comment')->where('original_invoice', $invm)->limit(1)->get();
         
//return $carts_sub_item;
         if(count($carts_offer) == 0)
         {
            $total_inv =0;
         }
         else{

       $total_inv =0;
       for($i=0 ;$i<count($carts_offer) ; $i++)
       {
$total_inv = $total_inv  + ($carts_offer[$i]->qty * $carts_offer[$i]->offer->price);

       }
   }
     if(count($carts_item) == 0)
         {
            $total_inv_item =0;
         }
else{
       $total_inv_item =0;
       for($i=0 ;$i<count($carts_item) ; $i++)
       {
$total_inv_item = $total_inv_item  + ($carts_item[$i]->qty * $carts_item[$i]->item->price);

       }
}
if(count($carts_sub_item) == 0)
{ $total_inv_child =0;}
else{
  //  return $carts_sub_item;
        $total_inv_child =0;
       for($i=0 ;$i<count($carts_sub_item) ; $i++)
       {
$total_inv_child = $total_inv_child  + ($carts_sub_item[$i]->qty * $carts_sub_item[$i]->child->price);

       }
   }

       $thetotalall = $total_inv_item + $total_inv +$total_inv_child;
       //return $total_inv;
       return view('admin.offers.cart_offer_buy_spec',compact('carts_offer','carts_item','thetotalall','carts_sub_item','user_name','drivers','order_status'));

        }
        public function invoice_adv_search(Request $r)
        {
$start_date = $r->input('start_date');
$end_date = $r->input('end_date');
//return $end_date;
       // $carts = Order::Orderby('id','DESC')->whereDate('created_at','=',date('Y-m-d'))->with('driver')->get();

  $carts = Order::orderBy('id', 'Desc')->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->with('driver')->get();
 // return $carts;
 return view('admin.offers.cart_offer_buy',compact('carts'));


        }
        public function view_cart_offer_stat()
        {


  $carts_notassigned = Order::Orderby('id','DESC')->where('status',0)->with('driver')->get();
 $carts_assigned = Order::Orderby('id','DESC')->where('status',1)->with('driver')->get();
  $carts_assigned_verified = Order::Orderby('id','DESC')->where('status',2)->with('driver')->get();
    $carts_finish_shop = Order::Orderby('id','DESC')->where('status',4)->with('driver')->get();
        $carts_delivered = Order::Orderby('id','DESC')->where('status',5)->with('driver')->get();





       //return $carts;
       return view('admin.offers.cart_offer_stat',compact('carts_notassigned','carts_assigned','carts_assigned_verified','carts_finish_shop','carts_delivered'));


        }


    }
