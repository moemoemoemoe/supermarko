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
                        <input type="text" name="room_name" placeholder="Room Name *" class="form-control" value="{{old('room_name')}}">
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
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($rooms)}} Room/s</div>

                <div class="panel-body">
                                                                               
@foreach($rooms as $room)
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50">{{$room->room_name}}</span></b>
            </div>
          
            <div class="panel-footer text-center">
                <a href="{!! route('room_index_view', ['id'=>$room->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
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
