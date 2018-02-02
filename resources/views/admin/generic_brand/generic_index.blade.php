@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Generic</div>

                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="generic_name" placeholder="Generic Name *" class="form-control" value="{{old('generic_name')}}">
                    </p>
                   <p>
                    <p>
                    <b>
                        Select Zone To This Generic 
                    </b>
                </p>
        <select class="form-control" name="zone_id"  >
      

            @foreach($zones as $zone)
            <option value="{{$zone->id}}">{{$zone->zone_name}}      ->    ->    ->    ->      {{$zone->room->room_name}}</option>
            @endforeach
        </select>
    </p>
                  
                   <p>
                    <b>
                        Choose a Logo/s  
                    </b>
                </p>
                <p>
                    <input type="file" name="photo"  class="form-control" />
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
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($generics)}} Generic/s</div>

                <div class="panel-body">
                                                                               
@foreach($generics as $generic)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$generic->generic_name}}</span></b>
            </div>
             <div class="panel-heading text-center">
                <b><span style="color: black">{{$generic->zone->zone_name}}</span></b>
            </div>
            <div class="panel-body" style="height:80px; background: url('{{asset('uploads/generic/'.$generic->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
          
            <div class="panel-footer text-center">
               <a href="{!! route('generic_index_view', ['id'=>$generic->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
            </div>
            <div class="panel-footer text-center">
               <a href="{!! route('generic_index_view_delete', ['id'=>$generic->id]) !!}" class="btn btn-danger form-control">Delete</a>
            </div>
        </div>
    </div>

    @endforeach

                </div>
  {!!$generics->links()!!} 
            </div>

        </div>
    </div> 
</div>
@endsection
