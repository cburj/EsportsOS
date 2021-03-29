@extends('layouts.app')

@section('content')

<div class="container my-5">


  <!--Section: Content-->
  <section class="dark-grey-text">

    <div class="row pr-lg-5">
      <div class="col-md-7 mb-4">

        <div class="view">
          <img src="/img/homepage_img.png" class="img-fluid" alt="smaple image">
        </div>

      </div>
      <div class="col-md-5 d-flex align-items-center">
        <div>
          
          <h3 class="font-weight-bold mb-4">Welcome to EsportsOS!</h3>

        	<p>The Esports Organisation System is designed to hell small-scale Esports events get up and running, without the need to develop their own software.</p>
        	<p>The application is designed to be as user-friendly as possible, with just a few clicks you can input all of your players & teams and generate a full event schedule.</p>

        	<a type="button" class="btn btn-danger btn-rounded mx-0" href="/matches">View Matches</a>

        </div>
      </div>
    </div>

  </section>
  <!--Section: Content-->
















  <div class="container my-5">
    <!--Section: Content-->
    <section>
  
      <h6 class="font-weight-normal text-uppercase font-small grey-text mb-4 text-center">FAQ</h6>
      <!-- Section heading -->
      <h3 class="font-weight-bold black-text mb-4 pb-2 text-center">Frequently Asked Questions</h3>
      <hr class="w-header">
      <!-- Section description -->
      <p class="lead text-muted mx-auto mt-4 pt-2 mb-5 text-center">Got a question? We've got answers!</p>
  
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">What is EsportOS</h5>
          <p class="text-muted">EsportsOS is the best place to host your small-scale Esports event. You can easily setup your event in a few clicks, without the need for any third party applications.</p>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">Is it secure?</h5>
          <p class="text-muted">You bet it is! EOS has built in authentication and privelleges, so you can resitrict access and keep tabs on malicious behaviour. The platform is also 100% yours - you don't share databases or resources with other events!</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">Who is EsportsOS for?</h5>
          <p class="text-muted">The application is designed for event organisers of Esports events. We recommend the application for numbers of teams of between 4-32</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">How can I setup the application?</h5>
          <p class="text-muted">We understand that not all Esports events will have/require an internet connection, so EsportOS can be hosted locally or in the cloud - it's completely up to you!</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">What about streaming my event?</h5>
          <p class="text-muted">EsportsOS comes built in with several responsive "Stream Assets" that can be used to output data to viewers of your livestreams, or even used as infographics for event attendees.</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">What about event moderation?</h5>
          <p class="text-muted">Admin users can quickly identify issues using our built in logging system, and talk directly to players to resolve any match conflicts.</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">What do players have access to?</h5>
          <p class="text-muted">Players are at the heart of the application. As a player, you have access to your full match schedule, historical match data and personal profiles.</p>
        </div>
      </div>
  
    </section>
    
  </div>


</div>

@endsection
