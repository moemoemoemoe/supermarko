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
        <b>
            Choose a photo/s
        </b>
    </p>
    <p>
        <input type="file" name="attachments[]"  class="form-control" multiple/>
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
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($images)}} image/s</div>

                <div class="panel-body">
                                                                               
@foreach($images as $main)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
           
              
                <span class="pull-right">

                @if($main->status == 1)
              <a href="{{route('publish_maincat', $main->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a href="{{route('publish_images_childs', $main->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif
                </span>
            </div>
            <div class="panel-body" style="height:150px ; background: url('{{asset('uploads/childs_images/'.$main->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
            <div class="panel-footer text-center">
                <a href="{{route('delete_images_childs', $main->id)}}" class="btn btn-danger form-control">DELETE</a>
            </div>
        </div>
    </div>@endforeach

                </div>
  
            </div>

        </div>
    </div>
</div>
@endsection
