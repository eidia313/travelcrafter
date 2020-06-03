@extends('frontend.layouts.app')
@section('pageTitle', 'About High Country')
@section('content')
<section class="page__header d-flex align-items-center justify-content-center text-center">
  <img src="{{url('frontend/images/')}}/abouthct.jpg" class="page__image" alt="About High Country">
  <h1>About High Country Trekking</h1>
</section>
<section class="about__catch">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <h4>We are Tailor Made Travel Company &amp; Consultant</h4>
          <p>We are a specialist in travel, based on our extensive personal experience of more than 40 year</p>
        </div>
    </div>
  </div>
</section>
<main class="about__main">
  <div class="container">
    <div class="row align-items-center about__comp">
      <div class="col-md-6 text-center">
        <img src="{{url('storage/images')}}/{{$about->image}}" alt="{{$about->title}}" class="w-75">
      </div>
      <div class="col-md-6">
        <h3>{{$about->title}}</h3>
        {!!$about->description!!}
      </div>
    </div>
    <div class="row about__video">
      <div class="col-md-12">
        <div class="video__wrap promovideo__wrap">
          <iframe width="560" height="215" src="https://www.youtube.com/embed/{{$settings->promovideo}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <section class="about__mission">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center">
          <img src="{{url('storage/images')}}/{{$mission->image}}" alt="{{$mission->title}}" class="w-75">
        </div>
        <div class="col-md-6">
          <h3>{{$mission->title}}</h3>
          {!! $mission->description !!}
        </div>
      </div>
    </div>
  </section>
  @include('frontend.components.metadatas')
  <section class="aboutteam">

  </section>
  @include('frontend.components.testimonials')
  @include('frontend.components.readytoexplore')
</main>
@endsection
