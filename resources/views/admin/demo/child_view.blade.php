@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Childs</div>

                <div class="panel-body">
                                                                                                
@foreach($childs as $child)
    <div class="col-md-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$child->name_sub}}</span></b>
            </div>
            
            <div class="panel-body" style="height:80px; background: url('{{asset('uploads/items/childs/'.$child->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
         <div class="panel-footer text-center">
               <a href="" class="btn btn-primary form-control">{{$child->price}} L.L</a>
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
