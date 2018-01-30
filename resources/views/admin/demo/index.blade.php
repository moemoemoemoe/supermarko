@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Demo</div>

                <div class="panel-body" style="height:600px;background: url('{{asset('images/demo/k_v.png')}}'); background-size: cover; background-repeat: no-repeat;" >
                   <div class="pull-right" style="padding-top:6%;padding-right: 5%">

                    <a href="{!! route('demo_get_generic', ['zone_id'=>2]) !!}">
                        <span class="btn btn-warning" style="color: white;font-weight: 900">Freezer</span>
                    </a>
                </div>

            <div class="pull-right" style="padding-top:20%;">
<a href="{!! route('demo_get_generic', ['zone_id'=>1]) !!}">

                <span class="btn btn-warning" style="color: white;font-weight: 900">Refregirator</span>
</a>

            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
