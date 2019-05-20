@extends('layouts.default')
@section('title', 'Home')

@section('content')
<div class="conatiner">
  <div class="row">
    <div class="col-8 col-sm-12 col-md-10 col-lg-10">
      <div class="row d-flex">
        <div class="flex-shrink">
          <div class="row d-flex ml-1">
            <div class="flex-fill flex-sm-fill flex-md-fill ml-3 mr-5">
              <button class="usa-button leaf-btn leaf-btn-green"><i class="fas fa-plus"></i> Create Request</button>
            </div>
            <div class="flex-fill flex-sm-fill flex-md-fill mr-5">
              <button class="usa-button leaf-btn ml-n5"><i class="fas fa-file"></i> Report Builder</button>
           </div>
         </div>
         <div class="inbox-form">
           <div class="row d-flex">
               <div class="flex-fill mx-5">
                   <form class="usa-form">
                    <select name="inbox-options" id="inbox-options">
                      <option value>Inbox (14)</option>
                      <option value="value1">Option A</option>
                      <option value="value2">Option B</option>
                      <option value="value3">Option C</option>
                    </select>
                  </form>
              </div>
              <div class="flex-fill mr-5">
                <a href="#" class="inbox-link">Open Inbox <i class="fas fa-external-link-alt"></i></a>
              </div>
            </div>
         </div>
       </div>
        <adv-search></adv-search>
    </div>
    <br />
    <inbox></inbox>
    <h2>My Requests</h2>
    <br />
    <requests></requests>

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
