@extends('layouts.default')
@section('title', 'Home')

@section('content')
<div class="conatiner">
  <div class="row">
    <div class="col-8 col-sm-12 col-md-10 col-lg-10">
        <adv-search-alt></adv-search-alt>
        <div class="row d-flex px-5">
            <h2 class="flex-fill align-self-end">My Requests</h2>
        </div>
    <br />

    <requests></requests>
    <br />
    <inbox-alt></inbox-alt>
    </div>
  <div class="col col-sm-12 col-md-12 col-lg-2">
    <div class="facility-news">
      <h4>Facility News</h4>
      <a href="">Sample Item Link</a>
      <p>Text for sample item</p>

      <a href="">Additional Sample Link</a>
      <p>Text for Additional sample item</p>

      <a href="">Updated information for ABC</a>
      <p>Updated information</p>

      <h3>Register for Event</h3>
      <p>Event information</p>

      <button class="usa-button leaf-btn">Sign Up</button>
      </div>
      <div class="recent-activity mt-5 mb-5">
        <h4>Recent Activity</h4>
        <p>Area for items that may be of intrest to LEAF users based on their recent acitivty.</p>

        <a href="#">Recent Used Link One</a>
        <p>Recent Link description</p>
        <a href="#">Suggested Link</a>
        </div>
  </div>
</div>
</div>
@stop
