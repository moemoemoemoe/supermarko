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
                        <input type="text" name="full_name" placeholder="Full name" class="form-control" value="{{$childs->full_name}}">
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
                    {{$childs->content}}
                  </textarea>                    </p>
                                    <p>
                   <p> <input type="text" name="mobile" placeholder="Mobile numbers" class="form-control" value="{{$childs->mobile}}"></p>

                     <p> <input type="text" name="address" placeholder="Address" class="form-control" value="{{$childs->address}}"></p>

                     <p> <input type="text" name="shifts" placeholder="Available days and time" class="form-control" value="{{$childs->shifts}}"></p>

                  
                    <input type="submit" value="Update" class="btn btn-primary form-control">
                </p>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
