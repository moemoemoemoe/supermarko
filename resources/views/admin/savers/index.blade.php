@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="title" placeholder="Title *" class="form-control" value="{{old('title')}}">
                    </p>
                    <p>
                        <textarea type="text" name="content" placeholder="Description" class="form-control" value="{{old('content')}}"></textarea>
                    </p>
                    
                   
       
                   <p>
                    <b>
                        Choose a photo Or Video
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
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($savers)}} Saver/s</div>

                <div class="panel-body">
                                                                               
@foreach($savers as $saver)
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$saver->title}}</span></b>
                 <span class="pull-right">

                @if($saver->status == 1)
              <a href="{{route('saver_index_publish', $saver->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a href="{{route('saver_index_publish', $saver->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif
                </span>
            </div>
            @if($saver->type == "jpg" || $saver->type == "png" || $saver->type == "JPG" || $saver->type == "PNG")
            <div class="panel-body" style="height:150px; background: url('{{asset('uploads/savers/'.$saver->url)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;"></div>
                @else
                 <div style="height:150px;">
                    <video  style="width: 100%;height: 150px" controls>
  <source src="{{asset('uploads/savers/'.$saver->url)}}" type="video/mp4">
</video>
                 </div>
                    @endif
            
          
            <div class="panel-footer text-center">
               <a href="{!! route('saver_update', ['id'=>$saver->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
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
