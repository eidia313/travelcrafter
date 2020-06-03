@extends('frontend.layouts.app')
@section('pageTitle', 'Our Team Members')
@section('content')
<section class="page__header d-flex align-items-center justify-content-center text-center">
  <img src="{{url('frontend/images/')}}/hctteam.jpg" class="page__image" alt="The Dream Team">
  <h1>The Dream Team</h1>
</section>
<section class="team__catch">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <p>Our team is made up of group of hand-picked, highly experienced personal. We are all driven by a mission to explore and share.</p>
        </div>
    </div>
  </div>
</section>
<main class="about__main">
  <div class="container">
    <div class="team__wrap">
      <div class="team__heading text-center">
        <h3>The High Country Team</h3>
      </div>
      <div class="row">
        @foreach($teams as $team)
          <div class="col-md-3 team__item">
            <figure>
              <img src="{{url('storage/images')}}/{{$team->image}}" class="image-responsive" alt="{{$team->name}}">
            </figure>
            <h5>{{$team->name}}</h5>
            <span>{{$team->designation}}</span>
          </div>

        @endforeach
      </div>
    </div>
  </div>

</main>
@endsection
