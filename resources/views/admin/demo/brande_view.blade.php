@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Items</div>

                <div class="panel-body">
                                                                                                
@foreach($items as $item)
    <div class="col-md-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$item->name}}</span></b>
            </div>
            
            <div class="panel-body" style="height:80px; background: url('{{asset('uploads/items/'.$item->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
          @if($item->has_sub == 1)
            <div class="panel-footer text-center">
               <a href="{!! route('child_view_domo', ['id'=>$item->id]) !!}" class="btn btn-primary form-control">HAS child</a>
            </div>

            @else

              <div class="panel-footer text-center">
               <a href="" class="btn btn-primary form-control">{{$item->price}}</a>
            </div>
            @endif
        </div>
    </div>

    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
