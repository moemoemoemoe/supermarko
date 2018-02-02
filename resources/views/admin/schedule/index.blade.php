@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <p>
                        <b>Choose Category</b>
                    </p>
                    <p>
                        <select class="form-control" name="time_schedule"  >
                            <option value="01:00">01:00</option>
                            <option value="02:00">02:00</option>
                            <option value="03:00">03:00</option>
                            <option value="04:00">04:00</option>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                            <option value="22:00">22:00</option>
                            <option value="23:00">23:00</option>
                            <option value="24:00">24:00</option>


                        </select>
                    </p>
  <p>
                    <input type="submit" value="Add Schedule" class="btn btn-primary form-control">
                </p>
                </form>

                   
                </div>


            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="color: red;font-weight: 900">{{count($scheduls)}} Schedule</div>

                <div class="panel-body">
                                                                               
@foreach($scheduls as $schedul)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$schedul->the_time}}</span></b>
            </div>
           
         
          
            <div class="panel-footer text-center">
               <a href="{!! route('delete_schedul_view', ['id'=>$schedul->id]) !!}" class="btn btn-danger form-control">Delete</a>
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
