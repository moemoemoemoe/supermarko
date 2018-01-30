<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel='stylesheet' id='compiled.css-css'  href="{{asset('a/compiled.min.css?ver=4.4.0')}}" type='text/css' media='all' />
</head>
<body>


    <!--Row with two equal columns-->
    
<div class="container">                      
<!--Card Wider-->
<div class="row">

<div class="card card-cascade wider">



<div class="card card-cascade">
  
    <div class="card-body">
        <!--Title-->
        <h4 class="card-title  text-center"><strong>Total: {{ $thetotalall }} L.L</strong></h4>
        <p>
            <span style="color: #000">Delevery date :</span> {{$user_name[0]->the_date}}
        </p>
        <p>
                    <span > <span style="color: #000"> Time : </span>{{$user_name[0]->the_time}}</span>    
                </p>
                <p>
<span > <span style="color: #000"> comment : </span>{{$user_name[0]->comment}}</span>   
</p> 
      <p>
        <center>
    <div id="response" style="color: red"></div>
    <p>
                <a id="send_ok" href="{!! route('finish_order', ['id'=>$invoice_number]) !!}" type="button" class="btn btn-primary" style="display: none;">Send Order</a>

    </p>
    </center>
</p>
        <p class="card-text"></span>
        </p>


<!--         <a  type="button" class="btn-floating btn-small btn-fb"><i class="fa fa-check"></i></a>
 -->    
 
       <!--      <a  type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a> -->

    
      
        <!-- <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fa fa-map"></i></a> -->
<!--         <a  type="button" class="btn-floating btn-small btn-primary" style="background-color: green"><i class="fa fa-eye"></i></a>
 -->
    </div>
 

</div>
<hr/>
@if($ready == 1)
<div class="card card-cascade text-center">
  
    <div class="card-body">
        
        <a  href="{!! route('finish_order', ['id'=>$invoice_number]) !!}" type="button" class="btn btn-primary">Send Order</a>
    </div>
 

</div>
@elseif($ready == 2 )
<div class="card card-cascade text-center">
  
    <div class="card-body">
        
        <a type="button" class="btn btn-danger">All ready Confirmed</a>
    </div>
 

</div>
@else
@endif



  @if(count($carts_offer)==0)
                @else
                    @foreach($carts_offer as $cart)
                

<!--Card Regular-->
<div class="card card-cascade text-center">
    <!--Card image-->
  <!--  <center> <div class="view overlay hm-white-slight">
        <img src="{{asset('uploads/offers/'.$cart->offer->img_name)}}" class="img-fluid" height="100px" style="text-align: center; height: 150px;">
        <a>
            <div class="mask"></div>
        </a>
    </div>
    </center> -->
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-body text-center">
        <!--Title-->
        <h4 class="card-title"><strong>{{ $cart->offer->title }}</strong></h4>
        <div class="row">
       <div class="col-md-4"> QTY : {{$cart->qty}} </div>
         <div class="col-md-4">Price : {{$cart->offer->price}} L.L </div>
 <div class="col-md-4">Total : <?php echo $cart->qty * $cart->offer->price;  ?> L.L</div>
</div>
        <p class="card-text"></span>
        </p>


        <a onclick="show_image('{{asset('uploads/offers/'.$cart->offer->img_name)}}')" id="imageresource"  type="button" class="btn-floating btn-small btn-fb"><i class="fa fa-eye"></i></a>
    
 
       <!--      <a  type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a> -->

    
      
        <!-- <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fa fa-map"></i></a> -->

        @if($cart->status == 0)
        <span id="confirm_{{$cart->id}}">
        <a  onclick="check_inv({{$cart->id}})"  type="button" class="btn-floating btn-small btn-primary" style="background-color: green"><i class="fa fa-check"></i></a>
</span>
        @else
                <a  type="button" class="btn-floating btn-small btn-primary" style="background-color: red"><i class="fa fa-check"></i></a>

        @endif

    </div>
 

</div>
<hr/>
@endforeach
        @endif 
        @if(count($carts_item)==0)
                @else
                    @foreach($carts_item as $cartitem)
                

<!--Card Regular-->
<div class="card card-cascade text-center">
    <!--Card image-->
  <!--  <center> <div class="view overlay hm-white-slight">
        <img src="{{asset('uploads/items/'.$cartitem->item->img_name)}}" class="img-fluid" height="100px" style="text-align: center; height: 150px;">
        <a>
            <div class="mask"></div>
        </a>
    </div>
    </center> -->
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-body text-center">
        <!--Title-->
        <h4 class="card-title"><strong>{{ $cartitem->item->name }}</strong></h4>
         <div class="row">
        <div class="col-md-4">QTY : {{$cartitem->qty}} </div>
        <div class="col-md-4">Price : {{$cartitem->item->price}} L.L </div>
<div class="col-md-4">Total : <?php echo $cartitem->qty * $cartitem->item->price;  ?> L.L</div>
</div>
        <p class="card-text"></span>
        </p>


        <a  onclick="show_image('{{asset('uploads/items/'.$cartitem->item->img_name)}}')" id="imageresource"   type="button" class="btn-floating btn-small btn-fb"><i class="fa fa-eye"></i></a>
    
 
       <!--      <a  type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a> -->

    
      
        <!-- <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fa fa-map"></i></a> -->
 @if($cartitem->status == 0)
 <span id="confirm_{{$cartitem->id}}">
        <a  onclick="check_inv({{$cartitem->id}})" type="button" class="btn-floating btn-small btn-primary" style="background-color: green"><i class="fa fa-check"></i></a>
    </span>
        @else
                <a  type="button" class="btn-floating btn-small btn-primary" style="background-color: red"><i class="fa fa-check"></i></a>

        @endif
    </div>
 

</div>
<hr/>
@endforeach
        @endif    
        @if(count($carts_sub_item)==0)
                @else
                    @foreach($carts_sub_item as $cartchild)
                

<!--Card Regular-->
<div class="card card-cascade">
    <!--Card image-->
  <!--  <center> <div class="view overlay hm-white-slight">
        <img src="{{asset('uploads/items/childs/'.$cartchild->child->img_name)}}" class="img-fluid" height="100px" style="text-align: center; height: 150px;">
        <a>
            <div class="mask"></div>
        </a>
    </div>
    </center> -->
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-body text-center">
        <!--Title-->
        <h4 class="card-title"><strong>{{ $cartchild->child->name_sub}}</strong></h4>
         <div class="row">
        <div class="col-md-4">QTY : {{$cartchild->qty}} </div>
        <div class="col-md-4">Price : {{$cartchild->child->price}} L.L </div>
<div class="col-md-4">Total : <?php echo $cartchild->qty * $cartchild->child->price;  ?> L.L</div>
</div>
        <p class="card-text"></span>
        </p>


      
    
     
     <a onclick="show_image('{{asset('uploads/items/childs/'.$cartchild->child->img_name)}}')" id="imageresource" type="button" class="btn-floating btn-small btn-fb"><i class="fa fa-eye"></i>
</a>
 
       <!--      <a  type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a> -->

    
      
        <!-- <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fa fa-map"></i></a> -->
        @if($cartchild->status == 0)

 <span id="confirm_{{$cartchild->id}}">
        <a  onclick="check_inv({{$cartchild->id}})"  type="button" class="btn-floating btn-small btn-primary" style="background-color: green"><i class="fa fa-check"></i></a>
    </span>
        @else
                <a   type="button" class="btn-floating btn-small btn-primary" style="background-color: red"><i class="fa fa-check"></i></a>

        @endif

    </div>
 

</div>
<hr/>
@endforeach
        @endif                                           
                       
</div>
</div>
</div>


<div class="modal fade large_bootbox" id="imagemodal" tabindex="-1" role="dialog" style="z-index: 999999999">
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
            <div class="col-md-9 col-sm-8 col-xs-8 ">
            <img src="" id="imagepreview" style="width: 300px; height: 300px;" >
            </div>
          </div>
        </div>

        <!-- Modal Actions -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js" integrity="sha384-3ziFidFTgxJXHMDttyPJKDuTlmxJlwbSkojudK/CkRqKDOmeSbN6KLrGdrBQnT2n" crossorigin="anonymous"></script>
<script type="text/javascript">
    function show_image(url)
    {
       // / window.alert(url);
        document.getElementById("imagepreview").src=url;
   // var src = document.getElementById("imagepreview");
   // src.appendChild(url);
   //$('#imagepreview').attr(); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); 
   
}
</script>

<script type="text/javascript">
    
    function check_inv(id)
    {
        var id_item = id;
       

$.ajax({
            url: '{{ route('check_inv') }}',
            type: 'POST',
            data:{
                _token: '{{ csrf_token() }}',
                id_item: id_item
            },
            cache: false,
            datatype: 'JSON',
            success: function(data){
               
                if(data.status == 1){
                    $('#response').html('this item is successfully checked');
                      
                   $('#confirm_'+id).html(' <a type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a>');


                }
                else if(data.status == 2)
                {
                $('#confirm_'+id).html(' <a type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a>');

$('#send_ok').show();

                }

                else
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
</body>