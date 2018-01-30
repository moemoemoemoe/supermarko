@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Zone index</div>
  <div class="panel-body">
                 <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="zone_name" placeholder="Zone Name *" class="form-control" value="{{old('zone_name')}}">
                    </p>
                      <p>
        <select class="form-control" name="room_id" >
      

            @foreach($rooms as $room)
            <option value="{{$room->id}}">{{$room->room_name}}</option>
            @endforeach
        </select>
    </p>
                     <p>
                    <input type="submit" value="Save" class="btn btn-primary form-control">
                </p>

            </form>

               
                </div>
            </div>
        </div>
    </div>

 <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($zones)}} Zone/s</div>

                <div class="panel-body">
                                                                               
@foreach($zones as $zone)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$zone->zone_name}}</span></b>
            </div>
            <div class="panel-heading text-center">
                <b><span style="color: black">{{$zone->room->room_name}}</span></b>
            </div>
          
            <div class="panel-footer text-center">
                <a href="{!! route('zone_index_view', ['id'=>$zone->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
            </div>
        </div>
    </div>

    @endforeach
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
