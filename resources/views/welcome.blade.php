@extends('layouts.app')

@section('content')

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 font-weight-normal">{{config('app.name', 'FYP')}}</h1>
      <p class="lead font-weight-normal">EsportsOS is a template/framework for tournament organisers to build their own custom event management system. 
        EOS provides a staring point, where players and teams can be created and matches can be automatically generated using a selection of algorithms.
        There is also support for data-driven dashboards, where information can be presented to viewers directly in livestreams, utilising reusable and responsive components.
      </p>
      <p>Note: Most functionality is hidden to non-admin users.</p>
     </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
  
    <div class="container">

    </div>
@endsection
