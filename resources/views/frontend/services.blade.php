@extends('frontend.layouts.app')
@section('pageTitle', 'Services')
@section('content')
<section class="page__header d-flex align-items-center justify-content-center text-center">
  <img src="{{url('frontend/images/')}}/hctservices.jpg" class="page__image" alt="What We Do">
  <h1>What We Do</h1>
</section>
<section class="about__catch">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          {!! $whatwedo->description !!}
        </div>
    </div>
  </div>
</section>
<main class="services__main">
  <div class="container">
    <div class="row align-items-center service__main">
      <div class="col-md-6 text-center">
        <img src="{{url('storage/images')}}/{{$planning->image}}" alt="{{$planning->title}}" class="w-75">
      </div>
      <div class="col-md-6">
        <h3>{{$planning->title}}</h3>
        {!!$planning->description!!}
      </div>
    </div>
  </div>
  <section class="promovideo">
    <div class="container">
      <div class="video__wrap promovideo__wrap">
        <iframe width="560" height="215" src="https://www.youtube.com/embed/{{$settings->promovideo}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>
  <section class="service__wrap">
    <div class="container">
      <div class="service__list--wrap">
        @foreach($services as $k=>$s)
        <div class="service__list row align-items-center {{($k%2 != 0 ? 'flex-row-reverse':'')}}">
          <div class="service__img col-md-6 text-center">
            <img src="{{url('storage/images')}}/{{$s->image}}" alt="{{$s->title}}" class="w-50">
          </div>
          <div class="service__desc col-md-6 {{($k%2 != 0 ? 'text-right':'')}}">
            <h4>{{$s->title}}</h4>
            {!!$s->description!!}
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>
  @include('frontend.components.testimonials')
  @include('frontend.components.readytoexplore')
</main>
@endsection
