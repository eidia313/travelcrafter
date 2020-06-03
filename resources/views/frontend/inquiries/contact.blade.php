@extends('frontend.layouts.app')
@section('pageTitle', 'Contact')
@section('content')

<section class="contact">
  <div class="container">
    <div class="section-heading text-center">
      <h1>How can we help you?</h1>
      <p>Do you have a question or are you interested in working with our team and us? Just fill out the form fields below.</p>
    </div>
    <div class="contact__form">
      @include('frontend.inquiries.partials.form')
    </div>
  </div>
</section>
<section class="contact__partners">
  <div class="container">
    <div class="section-heading text-center">
      <h2>Or connect with us through</h2>
    </div>
    <div class="row">
      <div class="col-md-3 border-right">
        <div class="contact--address">
          <h4>Address</h4>
          {!! $setting->address !!}
        </div>
        <div class="contact--phone">
          <h4>Phone</h4>
          +977-{{ $setting->landline }}
        </div>
        <div class="contact--email">
          <h4>Email</h4>
          {{ $setting->email }}
        </div>
        <div class="contact__social--links">
      <ul class="d-flex align-items-center">
        @if(isset($settings->twitter))
        <li>
          <a href="https://www.twitter/com/{{$settings->twitter}}" target="_blank">
            <i class="hct-twitter"></i>
          </a>
        </li>
        @endif
        @if(isset($settings->facebook))
        <li>
          <a href="https://www.facebook.com/{{$settings->facebook}}" target="_blank">
            <i class="hct-facebook"></i>
          </a>
        </li>
        @endif
        @if(isset($settings->youtube))
        <li>
          <a href="https://www.youtube.com/{{$settings->youtube}}" target="_blank">
            <i class="hct-youtube"></i>
          </a>
        </li>
        @endif
        @if(isset($settings->instagram))
        <li>
          <a href="https://www.instagram.com/{{$settings->instagram}}" target="_blank">
            <i class="hct-instagram"></i>
          </a>
        </li>
        @endif
        @if(isset($settings->whatsapp))
        <li>
          <a href="https://api.whatsapp.com/send?phone={{$settings->whatsapp}}" target="_blank">
            <i class="hct-instagram"></i>
          </a>
        </li>
        @endif
      </ul>
    </div>
      </div>
      <div class="col-md-9">
        @foreach($countries as $country)
          @if(count(getPartners($country->id)) > 0)
          <div class="contact__partners--country">
            <h3 class="border-bottom">{{$country->name}}</h3>
            <div class="row">
              @foreach(getPartners($country->id) as $partner)
                <div class="col-md-4 contact__partners--list">
                  <h5>{{$partner->name}}</h5>
                  <span>{{$partner->city}}</span>
                  <span>{{$partner->email}}</span>
                </div>
              @endforeach
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
    
  </div>
</section>
@endsection
