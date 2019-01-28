@extends('layouts.app')

@section('content')

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>


            <div class="row">
            <div class="col-md-11">
                <input type="text" id="identificacion" placeholder="identificacion" class="form-control">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn bg-{{ Theme_Color() }} btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">search</i>
                        </button>
            </div>
            </div>

            </h2></div>
            <div class="body">



                <video id="preview" style="width:100%"></video>



            </div>
        </div>
    </div>
</div>

@include($modulo_url.'.scripts')
@endsection

