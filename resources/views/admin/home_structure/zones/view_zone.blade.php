@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Room index</div>
  <div class="panel-body">
                 <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="zone_name" placeholder="Zone Name *" class="form-control" value="{{$zones->zone_name}}">
                    </p>
                    <p>
        <select class="form-control" name="room_id">
            @foreach($rooms as $room)
            <option value="{{$room->id}}" {{ ($zones->room_id == $room->id) ? 'selected' : '' }}>{{$room->room_name}}</option>
            @endforeach
        </select>
    </p>
                     <p>
                    <input type="Submit" value="Update" class="btn btn-primary form-control">
                </p>

            </form>

               
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
