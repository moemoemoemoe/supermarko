<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
    <!-- Styles -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css
" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else



                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             <img src="{{asset('images/invoices_icons.png')}}" width="22px">
                            Invoices<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{route('view_cart_offer')}}"> <img src="{{asset('images/invoices_icons.png')}}" width="20px">Invoices cart </a>
                        </li>
                     <li>
                          <a href="{{route('view_cart_offer_stat')}}"><img src="{{asset('images/stat_icon.png')}}" width="20px"> Inv Statistics </a>
                        </li>
  <!--  <li>
                          <a href=""> Invoices cart </a>
                        </li> -->

                        
                          
                    </ul>
 <!--                </li>
 <li>
                          <a href="{{ route('view_cart_offer')}}"><img src="{{asset('images/invoices_icons.png')}}" width="25px"> Invoices cart </a>
                        </li> -->
 <!-- <li><a href="{{ route('demo_index') }}"><img src="{{asset('images/demo_icons.png')}}" width="30px">Demo</a></li> -->
                           <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             <img src="{{asset('images/shop_icons.png')}}" width="22px">
                            Shop<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{route('item_index')}}"> <img src="{{asset('images/shop_manage_icons.png')}}" width="20px">Upload item </a>
                        </li>
                     <li>
                          <a href="{{route('item_manage')}}"><img src="{{asset('images/edit_icons.png')}}" width="20px"> Manage Items </a>
                        </li>
  <!--  <li>
                          <a href=""> Invoices cart </a>
                        </li> -->

                        
                          
                    </ul>
                </li>
                       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             <img src="{{asset('images/offers_icons.png')}}" width="25px">
                            Offers<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ route('add_offer')}}"> Upload Offer </a>
                        </li>
                     <li>
                          <a href="{{ route('manage_offer')}}"> Manage Offer </a>
                        </li>
    <li>
                          <a href="{{ route('saver_index')}}"> Manage Screen Saver </a>
                        </li>

                        
                          
                    </ul>
                </li>

              

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <img src="{{asset('images/brandes_icons.png')}}" width="25px">   Generic & Brandes<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{route('generic_index')}}"><img src="{{asset('images/edit_icons.png')}}" width="20px"> Manage Generics </a>
                        </li>
                     <li>
                          <a href="{{route('brande_index')}}"> <img src="{{asset('images/brand_edit_icons.png')}}" width="25px"> Manage Brandes </a>
                        </li>
   

                        
                          
                    </ul>
                </li>
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <img src="{{asset('images/home_icons.png')}}" width="25px">   Home Structure<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{route('room_index')}}"><img src="{{asset('images/rooms_icons.png')}}" width="20px"> Manage Rooms </a>
                        </li>
                     <li>
                          <a href="{{route('zone_index')}}"> <img src="{{asset('images/zones_icons.png')}}" width="20px"> Manage Zones </a>
                        </li>
   

                        
                          
                    </ul>
                </li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <img src="{{asset('images/drivers.png')}}" width="25px">C & D<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{route('customer_index')}}"><img src="{{asset('images/customers.png')}}" width="20px"> Manage Customers </a>
                        </li>
                     <li>
                          <a href="{{route('customer_index')}}"> <img src="{{asset('images/drivers_icon.png')}}" width="20px"> Manage Drivers </a>
                        </li>
   

                        
                          
                    </ul>
                </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row" style="padding-right:22%;padding-left: 22%">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger" >
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{Session('success')}}</p>
                    @endif
                   
                </div>

        @yield('content')
    </div>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
   
    <script type="text/javascript">
        var id_offer;
        function show_delete_modal(id)
        {
           id_offer = id;
 $('#modal-confirm-operator-message').modal('show');
        }

        function delete_offer()
        {

$.ajax({
            url: '{{ route('delete_offer') }}',
            type: 'POST',
            data:{
                _token: '{{ csrf_token() }}',
                id_offer: id_offer
            },
            cache: false,
            datatype: 'JSON',
            success: function(data){
               
                if(data.status == 1){
                    $('#response').html('this Offer is successfully Deleted');
                   
setTimeout(function(){

                $('#modal-confirm-operator-message').modal('hide');
                window.location.replace('http://test.arcazur.com/admin/manage_offer');
            }, 2000);

                }else
                {
                   $('#response').html('Please Try Again');
                }
               },
               error: function(){

               }
           });

        }
    </script>
    <script type="text/javascript">
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;

        CKEDITOR.replace( 'content_item' );
    </script>

    <script type="text/javascript">
        

  function showComment()
  {
  $('#modal-confirm-operator-message').modal('show');

  }
    </script>
   

<script type="text/javascript">
     $(function () {
   var bindDatePicker = function() {
        $(".date").datetimepicker({
        format:'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).find('input:first').on("blur",function () {
            // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
            // update the format if it's yyyy-mm-dd
            var date = parseDate($(this).val());

            if (! isValidDate(date)) {
                //create date based on momentjs (we have that)
                date = moment().format('YYYY-MM-DD');
            }

            $(this).val(date);
        });
    }
   
   var isValidDate = function(value, format) {
        format = format || false;
        // lets parse the date to the best of our knowledge
        if (format) {
            value = parseDate(value);
        }

        var timestamp = Date.parse(value);

        return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
        var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
        if (m)
            value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

        return value;
   }
   
   bindDatePicker();
 });
</script>
</body>
</html>
