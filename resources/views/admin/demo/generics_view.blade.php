@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Generic View</div>

                <div class="panel-body">
                                                                                             
@foreach($generics as $generic)
    <div class="col-md-2">
       
           <!--  <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$generic->generic_name}}</span></b>
            </div> -->
            
           <div class="panel-body" style="height:60px; background: url('{{asset('uploads/generic/'.$generic->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
           <p> <p><a href="{!! route('brande_view_by_generic', ['id'=>$generic->id]) !!}"> {{$generic->generic_name}}</a></p></p>
                
            
          
        </div>

    </div>

    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
