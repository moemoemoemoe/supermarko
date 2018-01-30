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
                        <input type="text" name="title" placeholder="Title *" class="form-control" value="{{$savers->title}}">
                    </p>
                    <p>
                        <textarea type="text" name="content" placeholder="Description" class="form-control" value="{{$savers->content}}">{{$savers->content}}</textarea>
                    </p>
                    
                
                       
                 <p>
        <b>Current Media</b>
    </p>
    <p>
    @if($savers->type == "jpg" || $savers->type == "png" || $savers->type == "JPG" || $savers->type == "PNG")
        <img src="{{asset('uploads/savers/'.$savers->url)}}" class="img img-responsive" style="height:200px" />
        @else
        <video  style="height: 200px" controls>
  <source src="{{asset('uploads/savers/'.$savers->url)}}" type="video/mp4">
</video>
@endif
                 
              

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
    </div>


</div>
@endsection
