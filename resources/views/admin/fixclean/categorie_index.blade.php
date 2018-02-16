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
                        <input type="text" name="name" placeholder="Category Name *" class="form-control" value="{{old('name')}}">
                    </p>
                   <p>
                    <p>
                    <b>
                        Select Main Category
                    </b>
                </p>
                <p>
        <select class="form-control" name="main_id">
      

            @foreach($mains as $main)
            <option value="{{$main->id}}">{{$main->name}}</option>
            @endforeach
        </select>
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

                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($categories)}}  category</div>

                <div class="panel-body">
                                                                               
@foreach($categories as $categorie)
    <div class="col-md-3">
        <div class="panel panel-default">
            
            <div class="panel-heading text-center">
           
                <b>{{$categorie->name}}</b> 
                <span class="pull-right">

                @if($categorie->status == 1)
              <a href="{{route('publish_cat', $categorie->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a href="{{route('publish_cat', $categorie->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif
                </span>
            </div>
            <div class="panel-heading text-center" style="color: red;font-weight: 900">
                {{$categorie->cat->name}}
             </div>
         <!--    <div class="panel-footer text-center">
                <a href="{{route('delete_category', $categorie->id)}}" class="btn btn-danger form-control">DELETE</a>
            </div> -->
        </div>
    </div>@endforeach

                </div>
  
            </div>

        </div>
    </div>
</div>
@endsection
