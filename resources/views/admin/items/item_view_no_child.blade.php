@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">View Item</div>

                <div class="panel-body">
                       <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="sub_title" placeholder="Title *" class="form-control" value="{{$item->name}}">
                    </p>
                    <p>
                        <textarea type="text" id="content_item" name="sub_content" placeholder="Description" class="form-control" value="{{$item->contetn}}">{{$item->content}}</textarea>
                    </p>
                    
                    <p>
        <b> Price In L.L</b>
    </p>
                 <p>
                        <input type="text" name="price" placeholder="price *" class="form-control" value="{{$item->price}}">
                    </p>
                     <p>
        <b> Current Photo</b>
        <img src="{{asset('uploads/items/'.$item->img_name)}}" class="img img-responsive" style="height:200px" />
    </p>
                   <p>
                    <b>
                        Choose a photo/s  (350px * 520px)
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
@endsection
