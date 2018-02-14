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
                        <input type="text" name="name" placeholder="Main Categorie Name" class="form-control" value="{{$mains->name}}">
                    </p>
                    <textarea name="content" class="form-control" placeholder="Description if exist">{{$mains->content}}</textarea>
                   
                   <p>
                     <p>
                        <b>Current icon</b>
                        </p>
                        <p>
                            <img src="{{asset('uploads/fixclean/'.$mains->img_name)}}" class="img img-responsive" style="height:200px" />
                        </p>
                    <b>
                        Choose a Logo/s  
                    </b>
                </p>
                <p>
                    <input type="file" name="photo"  class="form-control" />
                </p>
                <p>
                    <input type="submit" value="Update" class="btn btn-primary form-control">
                </p>

            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
