@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Brandes</div>

                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="brande_name" placeholder="Brande Name *" class="form-control" value="{{old('brande_name')}}">
                    </p>
                   <p>
                   <!--  <p>
                    <b>
                        Select One Or Multiple Generic To This Brande 
                    </b>
                </p> -->
       <!--  <select class="form-control" name="generic_id[]"  multiple="multiple" style="height:150px">
      

            @foreach($generics as $generic)
            <option value="{{$generic->id}}">{{$generic->generic_name}} ->->->->-> {{$generic->zone->zone_name}} </option>
            @endforeach
        </select> -->
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
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($brandes)}} Brande/s</div>

                <div class="panel-body">
                                                                               
@foreach($brandes as $brande)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$brande->brande_name}}</span></b>
            </div>
             
          
          
            <div class="panel-footer text-center">
                <a href="{!! route('brande_index_view', ['id'=>$brande->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
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
