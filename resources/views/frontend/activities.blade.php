@extends('frontend.layouts.app')
@section('pageTitle', 'Activities')
@section('content')
<section class="page__header d-flex flex-column align-items-center justify-content-center text-center">
  <img src="{{url('frontend/images/')}}/ouractivities.jpg" class="page__image" alt="Activities">
  <h1>Our Activities</h1>
  <p>Decades of experience and a great team- what we do, where we go make us unforgettable.</p>
</section>
<main id="main">
  <div class="container">
    <div class="activity activity--page">
      <div class="activity__wrap">
        <div class="row no-gutters">
        @foreach($activities as $k=>$a)
        <div class="col-md-4">
          <div class="activity__wrap--list">
            <a href="{{url('/activity')}}/{{$a->slug}}">
              <figure>
                <img src="{{url('storage/images')}}/{{$a->image}}" alt="{{$a->name}}">
                <figcaption class="activity__wrap--caption">
                    <div>
                    {{$a->name}}
                    </div>
                </figcaption>
              </figure>
            </a>
          </div>
        </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
