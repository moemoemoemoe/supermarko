@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

                     <div class="list-group">
    <div  class="list-group-item active text-center" style="font-weight: 900">{{count($drivers)}} Drivers</div>
    @foreach($drivers as $driver)
    <div class="list-group-item text-center">
    	<span style="color: red;font-weight: 900" class="pull-left" ><a href="{{route('get_driver_report', $driver->id)}}">{{$driver->name}}</a></span>
    	<span class="pull-center" style="text-align: center!important">{{$driver->email}}</span>
    	<span class="pull-right">{{$driver->mobile}}</span>

 @if($driver->status == 1)
              <a class="pull-left" style="padding-left: 20px" href="{{route('publish_driver', $driver->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a class="pull-left" style="padding-left: 20px" href="{{route('publish_driver', $driver->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif

    </div>
   
    @endforeach
  </div>

  <hr/>

                     <div class="list-group">
    <a  class="list-group-item active text-center" style="font-weight: 900">{{count($customers)}} Customers</a>
    @foreach($customers as $customer)
    <a href="#" class="list-group-item text-center">
    	<span style="color: red;font-weight: 900" class="pull-left" >{{$customer->name}}</span>
    	<span class="pull-center" style="text-align: center!important">{{$customer->address}}</span>
    	<span class="pull-right">{{$customer->phone}}</span>

    </a>
   
    @endforeach
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
