@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   
 <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="name" placeholder="Main Categorie Name" class="form-control" value="{{old('name')}}">
                    </p>
                    <textarea name="content" class="form-control" placeholder="Description if exist">{{old('content')}}</textarea>
                   
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
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($mains)}} main category</div>

                <div class="panel-body">
                                                                               
@foreach($mains as $main)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
           
                <b>{{$main->name}}</b> 
                <span class="pull-right">

                @if($main->status == 1)
              <a href="{{route('publish_maincat', $main->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a href="{{route('publish_maincat', $main->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif
                </span>
            </div>
            <div class="panel-body" style="height:150px ; background: url('{{asset('uploads/fixclean/'.$main->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
            <div class="panel-footer text-center">
                <a href="{{route('view_main', $main->id)}}" class="btn btn-primary form-control">More...</a>
            </div>
        </div>
    </div>@endforeach

                </div>
  
            </div>

        </div>
    </div>

</div>
@endsection
