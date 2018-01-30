@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Upload Item<span class="btn btn-info pull-right" onclick="show_the_child();">+ Has child</span>
          <span class=" pull-right">OR</span>
          <span class="btn btn-warning pull-right" onclick="show_the_price();">+ No child</span></div>
          <div class="panel-body">
            <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-md-8">

                <p>
                  <input type="text" name="item_name" placeholder="Item Name *" class="form-control" value="{{old('item_name')}}">
                </p></div>
                <div class="col-md-4">

                 <p>

                  <input type="file" name="photo"  class="form-control" />
                </p>
              </div>

              <hr/><hr/>
              <div class="col-md-8">
                <p>

                  <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{old('content_item')}}
                  </textarea>

                </p>
                 <p>
                  <select class="form-control" name="vat" >
                     <option value="0">No Vat</option>
                     <option value="1">With Vat</option>
                  
                  </select>
                </p>
              </div>
              <div class="col-md-4">
                <p>
                  <b>Choose Room</b>
                </p>
                <p>
                  <select class="form-control" name="room_id" onchange="show_zone(this);" >
                    <option value="-1" >--Select Room--</option>

                    @foreach($rooms as $room)
                    <option value="{{$room->id}}">{{$room->room_name}}</option>
                    @endforeach
                  </select>
                </p>
                <p>
                  <b>Choose Zone<p> <span id="loading" style="color: red;font-weight: 900;display: none;">LOADING...</span></p></b>
                </p>
                <p>
                  <select class="form-control" name="zone_id" id="zone_id" onchange="show_generic(this);" >
                   <option value="-1" >--Select Zone--</option>
                 </select>
               </p>
               <p>
                <b>Choose Generic<p> <span id="loading" style="color: red;font-weight: 900;display: none;">LOADING...</span></p></b>
              </p>
              <p>
                <select class="form-control" name="generic_id" id="generic_id" onchange="show_brande(this);">
<option value="-1" >--Select Geeneric--</option>
                </select>

              </p>
              <p>
                <b>Choose Brand<p> <span id="loading" style="color: red;font-weight: 900;display: none;">LOADING...</span></p></b>
              </p>
              <p>
                <select class="form-control" name="brande_id" id="brande_id">

                </select>
              </p></div>

              <hr style=" border: 0;
              clear:both;
              display:block;
              width: 96%;               
              background-color:#000;
              height: 1px;"/>

              <div class="col-md-12" id="dynamicInput" style="display: none">

                <div class="col-md-2">
                  <input type="text" id="item_child" name="item_child[]" placeholder="Child Name *" class="form-control" value="{{old('item_child')}}">
                </div>
                <div class="col-md-2">
                  <p>
                    <input type="text" id="price_child" name="price_child[]" placeholder="Price *" class="form-control" value="{{old('price_child')}}">
                  </p>
                </div>

                <div class="col-md-3">
                  <p>
                    <input type="file" id="photo_child" name="photo_child[]"  class="form-control" />
                  </p>
                </div>
                <div class="col-md-4">

                  <p>
                    <textarea type="text" id="content_child" name="content_child[]" placeholder="Description" class="form-control" value="{{old('content_child')}}"></textarea>

                  </p>
                </div>

                <div class="col-md-1">
                  <p>
                    <img src="{{asset('images/plus_icons.png')}}" width="30px" height="30px" onClick="addInput('dynamicInput');" id="plus" />
                  </p>
                </div>
              </div>

              <div class="col-md-12" id="original_item_price" style="display: none">

               <p> <input type="text" id="original_price" name="original_price" placeholder="Original Price" class="form-control" value="{{old('original_price')}}"></p>


              </div>

              <hr style=" border: 0;
              clear:both;
              display:block;
              width: 96%;               
              background-color:#000;
              height: 1px;"/>
              <p><p>
                <input type="submit" value="Save" id="save" class="btn  form-control" disabled>
              </p></p>
            </form>


          </div>
        </div>
      </div>
    </div>

  </div>

  <script type="text/javascript">

    var counter = 1;
    var limit = 8;
    function addInput(divName){
     if (counter == limit)  {
      alert("You have reached the limit of adding " + counter + " inputs");
    }
    else {
      var newdiv = document.createElement('div');
      newdiv.innerHTML = "<div class='col-md-2'><input type='text' id='item_child' name='item_child[]' placeholder='Child Name *' class='form-control' value='{{old('item_child')}}'></div><div class='col-md-2'><p><input type='text' id='price_child' name='price_child[]' placeholder='Price *' class='form-control' value='{{old('price_child')}}'></p></div><div class='col-md-3'> <p> <input type='file' id='photo_child' name='photo_child[]' class='form-control' /></p></div><div class='col-md-4'><p> <textarea  type='text' id='content_child' name='content_child[]' placeholder='Description' class='form-control' value='{{old('cocontent_childntent')}}'></textarea></p></div> <div class='col-md-1'> <p><img src='{{asset('images/edit_icons.png')}}' width='30px' height='30px'/></p></div>";
      document.getElementById(divName).appendChild(newdiv);
      counter++;

    }
  }
  function show_the_child(){
    document.getElementById("save").disabled = false;
    var d = document.getElementById("save");
     d.className += " btn-primary";
    
   $('#original_item_price').hide();
   $('#dynamicInput').show();
   $('#original_price').val('');

 }
 function show_the_price() {
       document.getElementById("save").disabled = false;
     var d = document.getElementById("save");
     d.className += " btn-primary";

  $('#dynamicInput').hide();
  $('#original_item_price').show();
  $('#item_child').val('');
  $('#price_child').val('');
  $('#photo_child').val('');
  $('#content_child').val('');
  
}

function show_zone(id){
  var id_room = id.value;
  $('#generic_id').html('');
//window.alert(id_room);
$.ajax({
  url: '{{ route('show_zone') }}',
  type: 'POST',
  data:{
    _token: '{{ csrf_token() }}',
    id_room:id_room
  },
  cache: false,
  datatype: 'JSON',
  success: function(response){
    $('#loading').show();
    $('#zone_id').html('');
    var i;
    var count = Object.keys(response).length;
    if(count == 0)
    {
      var option=$('<option></option>');
      option.attr('value',-1);
      option.text('--No Zones--');
      $('#zone_id').append(option);
    }
    var JSONObject = JSON.parse(JSON.stringify(response));
    
    for(i=0;i<count;i++)
    { 
     var option=$('<option></option>');
     option.attr('value',JSONObject[i]["id"]);
     option.text(JSONObject[i]["zone_name"]);
     $('#zone_id').append(option);
   }
   $('#zone_id').append('<option value="-1">---choose--</option>');
   $('#loading').hide();

 },error:function(){
  alert('Somthing Went Wrong');
  $('#loading').hide();

}
});

}
function show_generic(id){
  var id_zone = id.value;
//window.alert(id_room);
$.ajax({
  url: '{{ route('show_generic') }}',
  type: 'POST',
  data:{
    _token: '{{ csrf_token() }}',
    id_zone:id_zone
  },
  cache: false,
  datatype: 'JSON',
  success: function(response){
    $('#loading').show();
    $('#generic_id').html('');
    var i;
    var count = Object.keys(response).length;
    if(count == 0)
    {
      var option=$('<option></option>');
      option.attr('value',-1);
      option.text('--No Generic--');
      $('#generic_id').append(option);
    }
    var JSONObject = JSON.parse(JSON.stringify(response));
    for(i=0;i<count;i++)
    {
     var option=$('<option></option>');
     option.attr('value',JSONObject[i]["id"]);
     option.text(JSONObject[i]["generic_name"]);
     $('#generic_id').append(option);
   }
    $('#generic_id').append('<option value="-1">---choose--</option>');
   $('#loading').hide();

 },error:function(){
  alert('Somthing Went Wrong');
  $('#loading').hide();

}
});

}
function show_brande(id){
  var id_generic = id.value;
//window.alert(id_room);
$.ajax({
  url: '{{ route('show_brande') }}',
  type: 'POST',
  data:{
    _token: '{{ csrf_token() }}',
    id_generic:id_generic
  },
  cache: false,
  datatype: 'JSON',
  success: function(response){
    $('#loading').show();
    $('#brande_id').html('');
    var i;
    var count = Object.keys(response).length;
    if(count == 0)
    {
      var option=$('<option></option>');
      option.attr('value',-1);
      option.text('--No Brandes--');
      $('#brande_id').append(option);
    }
    var JSONObject = JSON.parse(JSON.stringify(response));
     var optiona=$('<option></option>');
     optiona.attr('value',-1);
     optiona.text("No brande");
     $('#brande_id').append(optiona);
    for(i=0;i<count;i++)
    {
     var option=$('<option></option>');
     option.attr('value',JSONObject[i]["id"]);
     option.text(JSONObject[i]["brande_name"]);
     $('#brande_id').append(option);
   }
   $('#loading').hide();

 },error:function(){
  alert('Somthing Went Wrong');
  $('#loading').hide();

}
});

}

</script>
@endsection
