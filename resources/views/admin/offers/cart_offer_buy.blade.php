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
                <div class="panel-heading text-center" style="font-weight: 900">{{count($carts)}} Invoice</div>
              </p>

              
                   @foreach($carts as $cart)
                     <div class="panel-body">
                      @if($cart->status == -99)
                       <div class="col-md-1"> <a href="#"><span class="btn btn-danger" style="margin: 10px">{{$cart->inv_id}} is Canceled</span></a></div>
                      @else
                  <div class="col-md-1"> <a href="{!! route('view_cart_offer_spec', ['invm'=>$cart->inv_id]) !!}"><span class="btn btn-primary" style="margin: 10px">{{$cart->inv_id}}</span></a></div>
                  @endif
                  @if($cart->role =='X')
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900;color: red">Not Assigned</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> No Set</span></div>
                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
                  @else
                  <div class="col-md-3"><span style="margin: 10px;font-weight: 900"> {{$cart->driver->name}}</span></div>
                  <div class="col-md-1"><span  style="margin: 10px;font-weight: 900"> {{$cart->role}}</span></div>
@if($cart->status == 1)
                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red"> waiting confirmation from picker</span></div>
                  @elseif($cart->status == 0)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: red"> Not assigned </span></div>
  @elseif($cart->status == 2)
  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: green">Accepted from picker </span></div>
                  
   @elseif($cart->status == 3)
  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: blue"> Picker has Finish shop  </span></div>
    @elseif($cart->status == 4)
  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red"> Delivery Not Confirmed yet</span></div>
   @elseif($cart->status == 5)
  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: sienna"> Accepted from delivery </span></div>
   @elseif($cart->status == 6)
  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: green">Deliverd</span></div>
    @elseif($cart->status == -99)
  <div class="col-md-2"><span  style="margin: 10px;font-weight: 900;color: sienna"> Canceled </span></div>
  @endif

                  <div class="col-md-3"><span  style="margin: 10px;font-weight: 900;color: red">{{$cart->created_at}}</span></div>
@endif
</div>

<hr/>
                   @endforeach

                
            </div>
        </div>
    </div>
</div>

@endsection
