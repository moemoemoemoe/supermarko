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
                        <input type="text" name="room_name" placeholder="Room Name *" class="form-control" value="{{$rooms->room_name}}">
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
