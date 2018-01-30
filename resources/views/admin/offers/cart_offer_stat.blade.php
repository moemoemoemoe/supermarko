@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                   <form method="POST" enctype="multipart/form-data" action="{{route('invoice_adv_search')}}" class="well"><input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class='input-group date' id='datetimepicker1'>
 
            
                <input type='text' placeholder="Start Date" name="start_date" class="form-control"  required autofocus/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div><br/>
                <div class='input-group date' id='datetimepicker1'>
 
                <input type='text' placeholder="End Date" name="end_date" class="form-control"  required autofocus/>
                
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div>
                <hr/>
                <div ><input type="submit" width= "200px" name="submit" value="Search" class="btn btn-primary form-control"></div>
                </form>
              <p>
                <div class="panel-heading" style="font-weight: 900">{{count($carts_notassigned)}} Invoice not set. //  {{count($carts_assigned)}} Invoice waiting .// {{count($carts_assigned_verified)}} Invoice verified. //  {{count($carts_finish_shop)}} Invoice finish shop not deliverd. //  {{count($carts_delivered)}} Invoice Deliverd</div>
           
              <hr/>
              </p>

              
                   @foreach($carts_notassigned as $cart)
                     <div class="panel-body">
                  <div class="col-md-2"> <a href="{!! route('view_cart_offer_spec', ['invm'=>$cart->inv_id]) !!}"><span class="btn btn-primary" style="margin: 10px">{{$cart->inv_id}}</span></a></div>
                  @if($cart->role =='X')
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900;color: red">Not Assigned</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
                  @else
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900"> {{$cart->driver->name}}</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900"> {{$cart->role}}</span></div>
@if($cart->status == 1)
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> waiting confirmation </span></div>
                  @elseif($cart->status == 0)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Not assigned </span></div>
  @elseif($cart->status == 2)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: green">Assigned Verify </span></div>
                  @elseif($cart->status == 3)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Rejected </span></div>
   @elseif($cart->status == 4)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: blue"> Finish shop  </span></div>
   @elseif($cart->status == 5)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: sienna"> Delivered </span></div>
  @endif

                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
@endif
</div>

<hr/>
                   @endforeach
                   <hr/>
                   <p>


                   	  @foreach($carts_assigned as $cart)
                     <div class="panel-body">
                  <div class="col-md-2"> <a href="{!! route('view_cart_offer_spec', ['invm'=>$cart->inv_id]) !!}"><span class="btn btn-primary" style="margin: 10px">{{$cart->inv_id}}</span></a></div>
                  @if($cart->role =='X')
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900;color: red">Not Assigned</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
                  @else
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900"> {{$cart->driver->name}}</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900"> {{$cart->role}}</span></div>
@if($cart->status == 1)
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> waiting confirmation </span></div>
                  @elseif($cart->status == 0)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Not assigned </span></div>
  @elseif($cart->status == 2)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: green">Assigned Verify </span></div>
                  @elseif($cart->status == 3)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Rejected </span></div>
   @elseif($cart->status == 4)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: blue"> Finish shop  </span></div>
   @elseif($cart->status == 5)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: sienna"> Delivered </span></div>
  @endif

                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
@endif
</div>

<hr/>
                   @endforeach

<hr/>


                   	  @foreach($carts_assigned_verified as $cart)
                     <div class="panel-body">
                  <div class="col-md-2"> <a href="{!! route('view_cart_offer_spec', ['invm'=>$cart->inv_id]) !!}"><span class="btn btn-primary" style="margin: 10px">{{$cart->inv_id}}</span></a></div>
                  @if($cart->role =='X')
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900;color: red">Not Assigned</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
                  @else
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900"> {{$cart->driver->name}}</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900"> {{$cart->role}}</span></div>
@if($cart->status == 1)
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> waiting confirmation </span></div>
                  @elseif($cart->status == 0)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Not assigned </span></div>
  @elseif($cart->status == 2)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: green">Assigned Verify </span></div>
                  @elseif($cart->status == 3)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Rejected </span></div>
   @elseif($cart->status == 4)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: blue"> Finish shop  </span></div>
   @elseif($cart->status == 5)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: sienna"> Delivered </span></div>
  @endif

                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
@endif
</div>

<hr/>
                   @endforeach

<hr/>

                   	  @foreach($carts_finish_shop as $cart)
                     <div class="panel-body">
                  <div class="col-md-2"> <a href="{!! route('view_cart_offer_spec', ['invm'=>$cart->inv_id]) !!}"><span class="btn btn-primary" style="margin: 10px">{{$cart->inv_id}}</span></a></div>
                  @if($cart->role =='X')
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900;color: red">Not Assigned</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
                  @else
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900"> {{$cart->driver->name}}</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900"> {{$cart->role}}</span></div>
@if($cart->status == 1)
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> waiting confirmation </span></div>
                  @elseif($cart->status == 0)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Not assigned </span></div>
  @elseif($cart->status == 2)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: green">Assigned Verify </span></div>
                  @elseif($cart->status == 3)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Rejected </span></div>
   @elseif($cart->status == 4)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: blue"> Finish shop  </span></div>
   @elseif($cart->status == 5)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: sienna"> Delivered </span></div>
  @endif

                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
@endif
</div>

<hr/>
                   @endforeach

<hr/>

                   	  @foreach($carts_delivered as $cart)
                     <div class="panel-body">
                  <div class="col-md-2"> <a href="{!! route('view_cart_offer_spec', ['invm'=>$cart->inv_id]) !!}"><span class="btn btn-primary" style="margin: 10px">{{$cart->inv_id}}</span></a></div>
                  @if($cart->role =='X')
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900;color: red">Not Assigned</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
                  @else
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900"> {{$cart->driver->name}}</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900"> {{$cart->role}}</span></div>
@if($cart->status == 1)
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> waiting confirmation </span></div>
                  @elseif($cart->status == 0)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Not assigned </span></div>
  @elseif($cart->status == 2)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: green">Assigned Verify </span></div>
                  @elseif($cart->status == 3)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Rejected </span></div>
   @elseif($cart->status == 4)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: blue"> Finish shop  </span></div>
   @elseif($cart->status == 5)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: sienna"> Delivered </span></div>
  @endif

                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
@endif
</div>

<hr/>
                   @endforeach

<hr/>

                
            </div>
        </div>
    </div>
</div>
@endsection
