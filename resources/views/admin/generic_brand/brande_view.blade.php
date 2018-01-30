@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Brandes</div>

                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="text" name="brande_name" placeholder="Brande Name *" class="form-control" value="{{$brandes->brande_name}}">
                    </p>
                   <p>
                    <p>
                  <!--   <b>
                        Select Generic To This Brande 
                    </b>
                 </p>
                        <p>
                            <select class="form-control" name="generic_id">
                                @foreach($generics as $generic)
                                <option value="{{$generic->id}}" {{ ($brandes->generic_id == $generic->id) ? 'selected' : '' }}>{{$generic->generic_name}} ->->-> -> -> -> {{$generic->zone->zone_name}}</option>
                                @endforeach
                            </select>
                        </p> 
                   -->
                 
             
                <p>
                    <input type="submit" value="Update" class="btn btn-primary form-control">
                </p>

            </form>
                </div>
            </div>
        </div>
    </div>

 
</div>
@endsection
