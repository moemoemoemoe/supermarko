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
                        <input type="text" name="full_name" placeholder="Full name" class="form-control" value="{{old('full_name')}}">
                    </p>
                     <p>
                    <b>
                        Select  Category
                    </b>
                </p>
                <p>
        <select class="form-control" name="cat_id">
      

            @foreach($categories as $main)
            <option value="{{$main->id}}">{{$main->name}}</option>
            @endforeach
        </select>
    </p>
                     <p>
                         <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{old('content_item')}}
                  </textarea>                    </p>
                                    <p>
                   <p> <input type="text" name="mobile" placeholder="Mobile numbers" class="form-control" value="{{old('mobile')}}"></p>

                     <p> <input type="text" name="address" placeholder="Address" class="form-control" value="{{old('address')}}"></p>

                     <p> <input type="text" name="shifts" placeholder="Available days and time" class="form-control" value="{{old('shifts')}}"></p>

                  
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

                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($childs)}} Customers</div>

                <div class="panel-body">
                                                                               
@foreach($childs as $child)
    <div class="col-md-3">
        <div class="panel panel-default">
            
            <div class="panel-heading text-center">
           
                <b>{{$child->full_name}}</b> 
                <span class="pull-right">

                @if($child->status == 1)
              <a href="{{route('publish_child_customer', $child->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a href="{{route('publish_child_customer', $child->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif
                </span>
            </div>
          </div>
            <div class="panel-heading text-center" style="color: red;font-weight: 900">
                {{$child->catsub->name}}
             </div>
            <div class="panel-footer text-center">
                <a href="{{route('child_edit_customer', $child->id)}}" class="btn btn-primary form-control">More...</a>
            </div>
            <div class="panel-footer text-center">
                <a href="#" class="btn btn-primary form-control" style="background-color: green">Images</a>
            </div>
        </div>
    </div>@endforeach

                </div>
  
            </div>

        </div>
    </div>
</div>
@endsection
