@extends('layouts.appa')

@section('content')
<div class="container" style="font-weight: 900">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="color: red;font-weight: 900">


                   <span style="color: #000"> Username :  </span>{{$user_name[0]->iduser}}
                    <span class="pull-left"> <span style="color: #000"> Email :</span> {{$user_name[0]->email}}</span>
<span class="pull-right"> <span style="color: #000">Total:</span> {{$thetotalall}} L.L</span></div>

  <div class="panel-heading text-center" style="color: red;font-weight: 900">


                     <span style="color: #000">Delevery date :</span> {{$user_name[0]->the_date}}
                    <span class="pull-left"> <span style="color: #000"> Time : </span>{{$user_name[0]->the_time}}</span>
                    <span class="pull-right" onClick="showComment()">Show Comment</span></div>
@if($order_status[0]->status == 2 || $order_status[0]->status == 4 || $order_status[0]->status == 5)
 <div class="panel-heading text-center" style="font-weight: 900">
<center><span style="color: blue;font-weight: 900">Allready Confirmed...!!</span></center></div>
@else

                    <div class="panel-heading text-center" style="font-weight: 900">
<form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<p>
                        <select class="form-control" name="driver_id">
                          @foreach($drivers as $driver)
                            <option value={{$driver->id}}>{{$driver->name}}</option>
                            @endforeach
                            

                        </select>
                    </p>
<p>
                        <select class="form-control" name="role"  >
                            <option value="Picker and Delevery">Picker and Delevery</option>
                            <option value="Picker">Picker</option>
                            <option value="Delevery">Delevery</option>


                        </select>
                    </p>
                    <p>
                    <input type="submit" value="Push Order" class="btn btn-primary form-control">
                </p>
                  </form>
                  </div>
                  @endif
</div>

               <table style="text-align: center;border: 1px solid #ddd!important">
                @if(count($carts_offer)==0)
                @else
                    @foreach($carts_offer as $cart)
                
  
       <tr border: 1px solid #ddd!important>
        <td style="height:100px;width:100px; background: url('{{asset('uploads/offers/'.$cart->offer->img_name)}}'); background-repeat: no-repeat;background-size: contain; background-position: center center;border: 1px solid #ddd!important"></td>
        <td style="width:300px;border: 1px solid #ddd!important">{{ $cart->offer->title }}</td>
        <td style="width:200px;border: 1px solid #ddd!important">{{$cart->qty}}</td>
        <td style="width:350px;border: 1px solid #ddd!important">{{$cart->offer->price}} L.L</td>
        <td style="width:350px;border: 1px solid #ddd!important"><?php echo $cart->qty * $cart->offer->price;  ?> L.L</td>
  
    @endforeach
    @endif
       @if(count($carts_item)==0)
                @else
     @foreach($carts_item as $cartitem)
  
       <tr border: 1px solid #ddd!important>
        <td style="height:100px;width:100px; background: url('{{asset('uploads/items/'.$cartitem->item->img_name)}}');background-repeat: no-repeat; background-size: contain; background-position: center center;border: 1px solid #ddd!important"></td>
        <td style="width:300px;border: 1px solid #ddd!important">{{ $cartitem->item->name }}</td>
        <td style="width:200px;border: 1px solid #ddd!important">{{$cartitem->qty}}</td>
        <td style="width:350px;border: 1px solid #ddd!important">{{$cartitem->item->price}} L.L</td>
        <td style="width:350px;border: 1px solid #ddd!important"><?php echo $cartitem->qty * $cartitem->item->price;  ?> L.L</td>
  
    @endforeach
  @endif
    @if(count($carts_sub_item)==0)
                @else
     @foreach($carts_sub_item as $cartchild)
  
       <tr border: 1px solid #ddd!important>
        <td style="height:100px;width:100px; background: url('{{asset('uploads/items/childs/'.$cartchild->child->img_name)}}'); background-repeat: no-repeat;background-size: contain; background-position: center center;border: 1px solid #ddd!important"></td>
        <td style="width:300px;border: 1px solid #ddd!important">{{ $cartchild->child->name_sub }}</td>
        <td style="width:200px;border: 1px solid #ddd!important">{{$cartchild->qty}}</td>
        <td style="width:350px;border: 1px solid #ddd!important">{{$cartchild->child->price}} L.L</td>
        <td style="width:350px;border: 1px solid #ddd!important"><?php echo $cartchild->qty * $cartchild->child->price;  ?> L.L</td>
  
    @endforeach
  @endif
</table>

<!-- @foreach($drivers as $driver)

  <div class="col-md-3">
  <a href="{!! route('push', ['id'=>$driver->id]) !!}"> <span>{{$driver->name}}</span></a>
     </div>
@endforeach -->



                </div>
            </div>
        </div>
    </div>
<div class="modal fade large_bootbox" id="modal-confirm-operator-message" tabindex="-1" role="dialog" style="z-index: 999999999">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title">

          </h4>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-4" id="operator_logo">

            </div>
            <div class="col-md-9 col-sm-8 col-xs-8 ">
            {{$user_name[0]->comment}}
            </div>
          </div>
        </div>

        <!-- Modal Actions -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
@endsection
