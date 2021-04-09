@extends('layouts.app')

@section('content')

<div class="container my-5">


  <!--Section: Content-->
  <section class="dark-grey-text">

    <div class="row pr-lg-5">
      <div class="col-md-7 mb-4">

        <div class="view">
          <img src="/img/home.gif" class="img-fluid" alt="smaple image">
        </div>

      </div>
      <div class="col-md-5 d-flex align-items-center">
        <div>
          
          <h3 class="font-weight-bold mb-4">Welcome to EsportsOS!</h3>

        	<p>The Esports Organisation System is designed to hell small-scale Esports events get up and running, without the need to develop their own software.</p>
        	<p>The application is designed to be as user-friendly as possible, with just a few clicks you can input all of your players & teams and generate a full event schedule.</p>

        	<a type="button" class="btn btn-danger btn-rounded mx-0" href="/matchups">View Matches</a>

        </div>
      </div>
    </div>

  </section>
  <!--Section: Content-->
















  <div class="container my-5">

    <!-- Section -->
    <section>
  
      <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">Features</h6>
      <h3 class="font-weight-bold text-center dark-grey-text pb-2">More About our Application</h3>
      <hr class="w-header my-4">
      <p class="lead text-center text-muted pt-2 mb-5"></p>
  
      <div class="row">
  
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card text-center bg-danger text-white">
            <div class="card-body">
              <p class="mt-4 pt-2"><i class="fas fa-file-code fa-4x"></i> <i class="fas fa-cloud fa-4x"></i></p>
              <h5 class="font-weight-normal my-4 py-2"><a class="text-white" href="#">Built using Web Technologies</a></h5>
              <p class="mb-4">By developing a web-based application, you can deploy it in the cloud or on a local server - giving you complete control over who can access the system.</p>
            </div>
          </div>
        </div>
  
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card text-center">
            <div class="card-body">
              <p class="mt-4 pt-2"><i class="fas fa-mobile-alt fa-4x grey-text"></i> <i class="fas fa-desktop fa-4x grey-text"></i></p>
              <h5 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="#">Cross Platform</a></h5>
              <p class="text-muted mb-4">There's no need for users to install apps or software onto their devices, just open the application in their browser - even on a mobile device!</p>
            </div>
          </div>
        </div>
  
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card text-center deep-purple lighten-1 text-white">
            <div class="card-body">
              <p class="mt-4 pt-2"><i class="fas fa-shield-alt fa-4x"></i></p>
              <h5 class="font-weight-normal my-4 py-2"><a class="text-white" href="#">Secure By Design</a></h5>
              <p class="mb-4">EsportsOS comes with authentication and logging out of the box. So you can protect your data and identify risks.</p>
            </div>
          </div>
        </div>
  
        <div class="col-md-6 col-xl-3">
          <div class="card text-center">
            <div class="card-body">
              <p class="mt-4 pt-2"><i class="fas fa-users fa-4x grey-text"></i></i></p>
              <h5 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="#">API</a></h5>
              <p class="text-muted mb-4">Thanks to our custom API, you can easily retrieve info from the database. You choose who gets acces to the API!</p>
            </div>
          </div>
        </div>
  
      </div>
  
    </section>
    <!-- Section -->
  
  </div>


</div>

@endsection
