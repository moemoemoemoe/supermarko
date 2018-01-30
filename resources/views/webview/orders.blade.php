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



<div class="card card-cascade">
  
    <div class="card-body text-center">
        <!--Title-->
        <strong>You Have: <span style="color: green">({{$counts}})</span> Pending Order/s</strong>
        <p>
         <strong>You Have: <span style="color: green">({{$countsdelivered
}})</span> Pending delivered</strong>
</p>
<p>
    <div id="response" style="color: red"></div>
</p>
        
</div>
        
   </div>
 



<div class="card card-cascade wider">


<!--Card Regular-->
@foreach($orders as $order)
@if($order->status >= 4)
<div class="card card-cascade" style="opacity: 0.4">
    @else
    <div class="card card-cascade" >
        @endif

    <!--Card image-->
  <!--   <div class="view overlay hm-white-slight">
        <img src="https://mdbootstrap.com/img/Photos/Others/men.jpg" class="img-fluid" alt="">
        <a>
            <div class="mask"></div>
        </a>
    </div> -->
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-body text-center">
        <!--Title-->
        <h4 class="card-title"><strong># {{$order->inv_id}}</strong></h4>
        <h5>{{$order->role}}</h5>

        <p class="card-text">To: <span style="font-weight: 900;color: red">{{$order->customer->name}}</span> , adress : <span style="font-weight: 900;color: red">{{$order->customer->address}}</span> , mobile number : <span style="font-weight: 900;color: red">{{$order->customer->phone}}</span>
        </p>
@if($order->status == 1)
<span id="confirm_{{$order->id}}">
        <a  type="button" class="btn-floating btn-small btn-fb" onclick="confirm_order({{$order->id}},{{$order->inv_id}})"><i class="fa fa-check"></i></a>
        </span>
    
    @else
            <a type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a>

      @endif
    
        <!-- <a href="{!! route('confirm_order', ['id'=>$order->id]) !!}"  type="button" class="btn-floating btn-small btn-tw"><i class="fa fa-ban"></i></a> -->
        <a href="http://maps.google.com/maps?saddr={{$order->customer->coor_x}},{{$order->customer->coor_y}}&daddr={{$order->customer->coor_x}},{{$order->customer->coor_y}}" type="button" class="btn-floating btn-small btn-dribbble"><i class="fa fa-map"></i></a>
        @if($order->status <= 1)
        <span id="eye_{{$order->id}}">
           <a   type="button" class="btn-floating btn-small btn-primary" style="background-color: green"><i class="fa fa-eye-slash"></i></a>
           </span>
        @else
        <a href="{!! route('view_order_by_driver', ['inv'=>$order->inv_id]) !!}" type="button" class="btn-floating btn-small btn-primary" style="background-color: green"><i class="fa fa-eye"></i></a>
        @endif

    </div>
 

</div>
@if($order->status == 4)
<a href="{!! route('confirm_order_delivered', ['id'=>$order->id]) !!}" type="button" class="btn btn-primary" style="z-index: 999999999;opacity: 1">Confirm if delivered!!</a>
@endif
@if($order->status == 5)
<a type="button" class="btn btn-danger" style="z-index: 999999999;opacity: 1">Delivered</a>
@endif
<hr/>
@endforeach

                        
                       
</div>
</div>
</div>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js" integrity="sha384-3ziFidFTgxJXHMDttyPJKDuTlmxJlwbSkojudK/CkRqKDOmeSbN6KLrGdrBQnT2n" crossorigin="anonymous"></script>


<script type="text/javascript">
    
    function confirm_order(id,inv)
    {
        var id_item =id;
                var inv =inv;
var url = '{{ route("view_order_by_driver", ":inv") }}';
url = url.replace(':inv', inv);


       

$.ajax({
            url: '{{ route('confirm_order') }}',
            type: 'POST',
            data:{
                _token: '{{ csrf_token() }}',
                id_item: id_item
            },
            cache: false,
            datatype: 'JSON',
            success: function(data){
               
                if(data.status == 1){
                    $('#response').html('this order is successfully accepted');
                      
                   $('#confirm_'+id).html('<a type="button" class="btn-floating btn-small btn-danger" style="background-color: red"><i class="fa fa-check"></i></a>');
                   $('#eye_'+id).html('<a href="'+url+'" type="button" class="btn-floating btn-small btn-primary" style="background-color: green"><i class="fa fa-eye"></i></a>');


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
</body>