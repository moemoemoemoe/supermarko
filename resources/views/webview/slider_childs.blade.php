<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
</head>
<style type="text/css">
	

	.img-responsive,
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  width: 950px;
  height: 540px;
}

/* ------------------- Carousel Styling ------------------- */

.carousel-inner {
  border-radius: 15px;
}

.carousel-caption {
  background-color: rgba(0,0,0,.5);
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
  padding: 0 0 10px 25px;
  color: #fff;
  text-align: left;
}

.carousel-indicators {
  position: absolute;
  bottom: 0;
  right: 0;
  left: 0;
  width: 100%;
  z-index: 15;
  margin: 0;
  padding: 0 25px 25px 0;
  text-align: right;
}

.carousel-control.left,
.carousel-control.right {
  background-image: none;
}


/* ------------------- Section Styling - Not needed for carousel styling ------------------- */

.section-white {
   padding: 10px 0;
}

.section-white {
  background-color: #fff;
  color: #555;
}

@media screen and (min-width: 768px) {

  .section-white {
     padding: 1.5em 0;
  }

}

@media screen and (min-width: 992px) {

  .container {
    max-width: 930px;
  }

}

</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css
" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <script src="{{ asset('js/app.js') }}"></script>
<body>
	
<div class="container">
	<div class="row">
	<div class="col-md-12">

		<section class="section-white">
 
@if(count($childs) == 0)
      	@else

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      	 @if(count($childs) == 1)
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        @elseif(count($childs) == 2)
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        @else
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        @endif
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
  @if(count($childs) == 1)

        <div class="item active">
      
          <img src="{{$childs[0]->image_url_original}}" alt="...">
     
        </div>
        @elseif(count($childs) == 2)
    <div class="item active">
      
          <img src="{{$childs[0]->image_url_original}}" alt="...">
     
        </div>

        <div class="item">
        
          <img src="{{$childs[1]->image_url_original}}" alt="...">
         
        </div>
        @else
        <div class="item active">
      
          <img src="{{$childs[0]->image_url_original}}" alt="...">
     
        </div>

        <div class="item">
        
          <img src="{{$childs[1]->image_url_original}}" alt="...">
         
        </div>
          <div class="item">
          	
          <img src="{{$childs[2]->image_url_original}}" alt="...">
         
        </div>
       
      </div>@endif
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
@endif
  
</section>

	</div>
</div>
<div class="row">
	<div class="col-md-12">
	
	{!!$description[0]->content!!}</div>


</div>
</div>




</body>

</html>