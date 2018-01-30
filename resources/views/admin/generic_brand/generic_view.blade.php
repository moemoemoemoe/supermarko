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
                            <input type="text" name="generic_name" placeholder="Generic Name *" class="form-control" value="{{$generics->generic_name}}">
                        </p>
                        <p>
                            <select class="form-control" name="zone_id">
                                @foreach($zones as $zone)
                                <option value="{{$zone->id}}" {{ ($generics->zone_id == $zone->id) ? 'selected' : '' }}>{{$zone->zone_name}}  ->    ->    ->    ->      {{$zone->room->room_name}}</option>
                                @endforeach
                            </select>
                        </p> 
                        <p>
                            <b>Current icon</b>
                        </p>
                        <p>
                            <img src="{{asset('uploads/generic/'.$generics->img_name)}}" class="img img-responsive" style="height:200px" />
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
    @endsection
