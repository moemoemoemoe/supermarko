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
       <td style="width:200px;border: 1px solid #ddd!important"><center><input type="number" id="qty_{{$cart->id}}" value="{{$cart->qty}}" class="form-control text-center" style="width: 100px;" /></center></td>
        <td style="width:200px;border: 1px solid #ddd!important">{{$cart->offer->price}} L.L</td>
        <td style="width:200px;border: 1px solid #ddd!important"><?php echo $cart->qty * $cart->offer->price;  ?> L.L</td>
         <td style="width:250px;border: 1px solid #ddd!important"><button class="btn btn-primary" onclick="update_qty({{$cart->id}},{{$cart->original_invoice}})">Update Qty</button></a></td>
  
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
        <td style="width:200px;border: 1px solid #ddd!important"><center><input type="number" id="qty_{{$cartchild->id}}" value="{{$cartchild->qty}}" class="form-control text-center" style="width: 100px;" /></center></td>
        <td style="width:200px;border: 1px solid #ddd!important">{{$cartchild->child->price}} L.L</td>
        <td style="width:200px;border: 1px solid #ddd!important"><?php echo $cartchild->qty * $cartchild->child->price;  ?> L.L</td>
       <td style="width:250px;border: 1px solid #ddd!important"><button class="btn btn-primary" onclick="update_qty({{$cartchild->id}},{{$cartchild->original_invoice}})">Update Qty</button></a></td>
  
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

   <div class="modal fade large_bootbox" id="modal-confirm-delete-message" tabindex="-1" role="dialog" style="z-index: 999999999">
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
            <div class="col-md-9 col-sm-8 col-xs-8" id="response">
              Are you sure you want to delete this Item!!!
            </div>
          </div>
        </div>

        <!-- Modal Actions -->
        <div class="modal-footer " style="text-align: center;">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancel()">cancel</button>
          <button type="button" class="btn btn-danger" onclick="delete_cart()" id="confirm_btn">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    

     var id_item;
      var original_invoice;   

        function update_qty(id,invoice)
        {
          id_item = id;
          original_invoice = invoice;
          var qty = $('#qty_'+id).val();

          if(qty<=0)
          {
 $('#modal-confirm-delete-message').modal('show');

          }
       //   window.alert(qty);

else
{
$.ajax({
            url: '{{ route('update_qty') }}',
            type: 'POST',
            data:{
                _token: '{{ csrf_token() }}',
                id_item: id_item,
                original_invoice:original_invoice,
                qty : qty



            },
            cache: false,
            datatype: 'JSON',
            success: function(data){
               
                if(data.status == 1){
                   window.alert(data.message)
 setTimeout(function(){

               
                window.location.replace('http://supermarko.arcazur.com/admin/view_cart_offer_spec/'+invoice);
            }, 1000);

                }else
                {
                   window.alert(data.message)
                }
               },
               error: function(){

               }
           });

        }
      }

      function delete_cart()
      {

        $.ajax({
            url: '{{ route('delete_cart_user') }}',
            type: 'POST',
            data:{
                _token: '{{ csrf_token() }}',
                id_item: id_item,
                original_invoice:original_invoice


            },
            cache: false,
            datatype: 'JSON',
            success: function(data){
               
                if(data.status == 1){
                  $('#modal-confirm-delete-message').modal('hide');
                 
 setTimeout(function(){

               
                window.location.replace('http://supermarko.arcazur.com/admin/view_cart_offer_spec/'+original_invoice);
            }, 1000);

                }
                else if(data.status == 0)
                {
 window.alert(data.message)
window.location.replace('http://supermarko.arcazur.com/admin/view_cart_offer');
                }

                else
                {
                   window.alert(data.message)
                }
               },
               error: function(){

               }
           });



      }

      function cancel()
      {
setTimeout(function(){

               
                window.location.replace('http://supermarko.arcazur.com/admin/view_cart_offer_spec/'+original_invoice);
            }, 1000);

      }
  </script>
@endsection
