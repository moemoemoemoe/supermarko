@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                     <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-12">
                <p>
                  <input type="text" name="name_en" placeholder="English Name *" class="form-control" value="{{$langs[0]->name_sub}}" >
                </p>
                 <p>

                  <textarea cols="80" id="content_item" name="content_en" rows="1"  >
                  {{$langs[0]->content}}
                  </textarea>

                </p>
            </div>
<div class="col-md-6">

                <p>
                	@if(empty($langs[0]->name_sub_fr))
                	 <input type="text" name="name_fr" placeholder="Frensh Name *" class="form-control" value="{{old('name_fr')}}">
                	 @else
                  <input type="text" name="name_fr" placeholder="Frensh Name *" class="form-control" value="{{$langs[0]->name_fr}}">
                  @endif
                </p>
                 <p>
         @if(empty($langs[0]->content_fr))
                  <textarea cols="80" id="content_item_fr" name="content_fr" rows="1" >
               {{old('content_fr')}}
                  </textarea>
@else
 <textarea cols="80" id="content_item_fr" name="content_fr" rows="1" >
             {{$langs[0]->content_fr}}
                  </textarea>
             
@endif
                </p>
            </div>

                        
<div class="col-md-6">
                <p>
                 @if(empty($langs[0]->name_sub_ar))
                  <input type="text" name="name_ar" placeholder="Arabic Name *" class="form-control" value="{{old('name_ar')}}">
                  @else
                   <input type="text" name="name_ar" placeholder="Arabic Name *" class="form-control" value="{{$langs[0]->name_sub_ar}}">
                   @endif
                </p>
                 <p>
 @if(empty($langs[0]->content_ar))
                  <textarea cols="80" id="content_item_ar" name="content_ar" rows="1" >
               {{old('content_ar')}}
                  </textarea>
                  @else
                   <textarea cols="80" id="content_item_ar" name="content_ar" rows="1" >
                {{$langs[0]->content_ar}}
                  </textarea>
                  @endif

                </p>
            </div>

            <div class="col-md-6">
                <p>
                	 @if(empty($langs[0]->name_sub_fil))
                  <input type="text" name="name_fil" placeholder="philipine Name *" class="form-control" value="{{old('name_fil')}}">
                  @else
                   <input type="text" name="name_fil" placeholder="philipine Name *" class="form-control" value="{{$langs[0]->name_sub_fil}}">
                   @endif
                </p>
                 <p>
 @if(empty($langs[0]->content_fil))
                  <textarea cols="80" id="content_item_fil" name="content_fil" rows="1" >
               {{old('content_fil')}}
                  </textarea>
                  @else
                   <textarea cols="80" id="content_item_fil" name="content_fil" rows="1" >
               {{$langs[0]->content_fil}}
                  </textarea>
                  @endif

                </p>
            </div>

              <div class="col-md-6">
                <p>
                	@if(empty($langs[0]->name_sub_am))
                  <input type="text" name="name_am" placeholder="Ethiopia Name *" class="form-control" value="{{old('name_am')}}">
                  @else
                    <input type="text" name="name_am" placeholder="Ethiopia Name *" class="form-control" value="{{$langs[0]->name_sub_am}}">
                  @endif
                </p>
                 <p>
 @if(empty($langs[0]->content_am))
                  <textarea cols="80" id="content_item_am" name="content_am" rows="1" >
               {{old('content_am')}}
                  </textarea>
                  @else
                   <textarea cols="80" id="content_item_am" name="content_am" rows="1" >
                {{$langs[0]->content_am}}
                  </textarea>
                  @endif

                </p>
            </div>
<p>
                <input type="submit" value="Save" id="save" class="btn btn-primary  form-control" >
              </p>
            </div>
          </form>

                
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
