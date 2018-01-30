@extends('layouts.appa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$offers->title}}
<div class="pull-right" onclick="show_delete_modal({{$offers->id}})"><span class="btn btn-danger" >DELETE</span> </div></div>
                <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="title" placeholder="Title *" class="form-control" value="{{$offers->title}}">
                    </p>
                    <p>
                        <textarea type="text" name="content" placeholder="Description" class="form-control">{{$offers->content}}</textarea>
                    </p>
                   <p>
                        <b>Choose Category</b>
                    </p>
                    <p>
                        <select class="form-control" name="cat_id" >
                          @if($offers->cat_id == 1)
                            <option value="1" >Clean</option>
                          
                            <option value="2">Shop</option>
                            <option value="3">Fix</option>
                            @endif
                             @if($offers->cat_id == 2)
                             <option value="2">Shop</option>
                            <option value="1">Clean</option>
                          
                            
                            <option value="3">Fix</option>
                            @endif
                              @if($offers->cat_id == 3)
                               <option value="3">Fix</option>
                            <option value="1">Clean</option>
                          
                            <option value="2">Shop</option>
                           
                            @endif


                        </select>
                    </p>
                    <p>
        <b>Enter Price In L.L</b>
    </p>
                 <p>
                        <input type="text" name="price" placeholder="price *" class="form-control" value="{{$offers->price}}">
                    </p>
                   <p>
                 <p>
        <b>Current photo</b>
    </p>
    <p>
        <img src="{{asset('uploads/offers/'.$offers->img_name)}}" class="img img-responsive" style="height:200px" />
    </p>

                    <b>
                        Choose a photo/s   (350px * 520px)
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
 <div class="modal fade large_bootbox" id="modal-confirm-operator-message" tabindex="-1" role="dialog" style="z-index: 999999999">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title">

          </h4>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-4" id="operator_logo">

            </div>
            <div class="col-md-9 col-sm-8 col-xs-8" id="response">
              Are you sure you want to delete this Offer!!!
            </div>
          </div>
        </div>

        <!-- Modal Actions -->
        <div class="modal-footer " style="text-align: center;">
          <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
          <button type="button" class="btn btn-danger" onclick="delete_offer()" id="confirm_btn">Continue</button>
        </div>
      </div>
    </div>
  </div>

@endsection
