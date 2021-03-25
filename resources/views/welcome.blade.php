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

        	<button type="button" class="btn btn-danger btn-rounded mx-0">View Matches</button>

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
          <h5 class="font-weight-normal mb-3">Can I cancel my subscription?</h5>
          <p class="text-muted">You can cancel your subscription anytime in your account. Once the subscription is cancelled, you will not be charged next month. You will continue to have access to your account until your current subscription expires.</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">How long are your contracts?</h5>
          <p class="text-muted">Currently, we only offer monthly subscription. You can upgrade or cancel your monthly account at any time with no further obligation.</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">Can I update my card details?</h5>
          <p class="text-muted">Yes. Go to the billing section of your dashboard and update your payment information.</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">Can I request refund?</h5>
          <p class="text-muted">Unfortunately, not. We do not issue full or partial refunds for any reason.</p>
        </div>
  
        <div class="col-md-6 col-lg-4 mb-4">
          <h5 class="font-weight-normal mb-3">Can I try your service for free?</h5>
          <p class="text-muted">Of course! We’re happy to offer a free plan to anyone who wants to try our service.</p>
        </div>
      </div>
  
    </section>
    
  </div>


</div>

@endsection
