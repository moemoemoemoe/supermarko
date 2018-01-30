@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <form method="POST" enctype="multipart/form-data" class="well" action="{{route('search_item')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="keyword" placeholder="Item Search" class="form-control" value="{{old('keyword')}}">
                    </p>
                                    <p>
                    <input type="submit" value="Save" class="btn btn-primary form-control">
                </p>
                  </form>

<center><span id="response"></span></center>
                </div>
                
                

                <div class="panel-body">
                  
                                                                                                 
@foreach($items as $item)
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center" style="background-color: #ccc">
                <b><span style="color: #4CAF50;font-weight: 900">
                     <input type="text" name="item_name" id="ids_{{$item->id}}" placeholder="Item Name *" class="form-control" value=" {{$item->name}}">
                     <span class="btn btn-info form-control" onclick="rename_item({{$item->id}})">Edit</span>
                   


                </span></b>
            </div>
            
            <div class="panel-body" style="height:80px; background: url('{{asset('uploads/items/'.$item->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
@if($item->has_sub == 0)
             <div class="panel-footer text-center">
               <a href="{!! route('item_view_no_child', ['id'=>$item->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
            </div>
             <div class="panel-footer text-center">
               <a href="{!! route('item_view_no_child_delete', ['id'=>$item->id]) !!}" class="btn btn-danger form-control">Delete</a>
            </div>
          @else
            <div class="panel-footer text-center">
               <a href="{!! route('child_index_view', ['id'=>$item->id]) !!}" class="btn btn-primary form-control" style="background-color: green">View Sub</a>
            </div>
             <div class="panel-footer text-center">
               <a href="{!! route('item_view_no_child_delete', ['id'=>$item->id]) !!}" class="btn btn-danger form-control">Delete</a>
            </div>
            @endif
        </div>
    </div>

    @endforeach
                </div>
                {!! $items->links() !!}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    function rename_item(id)
    {
        var id_item =id;
var a = document.getElementById('ids_'+id).value;
     var item_name =a;       

$.ajax({
            url: '{{ route('update_the_item') }}',
            type: 'POST',
            data:{
                _token: '{{ csrf_token() }}',
                id_item: id_item,
                item_name  :item_name
            },
            cache: false,
            datatype: 'JSON',
            success: function(data){
               
                if(data.status == 1){
                    $('#response').html('this Item is successfully updated');
                   
setTimeout(function(){

              
                window.location.replace('http://test.arcazur.com/admin/home/items/item_manage');
            }, 1000);

                }else
                {
                   $('#response').html('Please Try Again');
                }
               },
               error: function(){
$('#response').html('Please Try Again');
               }
           });

        
    }
</script>

@endsection
