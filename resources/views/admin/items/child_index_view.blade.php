@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="item_child" placeholder="Item name" class="form-control" value="{{old('item_child')}}">
                    </p>
                     <p>
                         <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{old('content_item')}}
                  </textarea>                    </p>
                                    <p>
                   <p> <input type="text" name="price_child" placeholder=" Price" class="form-control" value="{{old('price_child')}}"></p>
                   <p>
                    <b>
                        Choose an Image  
                    </b>
                </p>
                <p>
                    <input type="file" name="child_photo"  class="form-control" />
                </p>
                    <input type="submit" value="Save" class="btn btn-primary form-control">
                </p>
                  </form>

                </div>

                <div class="panel-body">
                  
                                                                                                 
@foreach($childs as $child)
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$child->name_sub}}</span></b>
            </div>
            
            <div class="panel-body" style="height:80px; background: url('{{asset('uploads/items/childs/'.$child->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
   <div class="panel-footer text-center">
               <a href="{!! route('child_index_view_lang', ['id'=>$child->id]) !!}" class="btn btn-default form-control" style="background-color: green;color: #fff">Setup Lang</a>
            </div>
             <div class="panel-footer text-center">
               <a href="{!! route('child_index_view_update', ['id'=>$child->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
            </div>

             <div class="panel-footer text-center">
               <a href="{!! route('child_index_view_delete', ['id'=>$child->id]) !!}" class="btn btn-danger form-control">Delete</a>
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
