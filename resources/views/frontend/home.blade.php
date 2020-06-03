@extends('frontend.layouts.homeapp')
@section('pageTitle', 'A quality Trekking Company')
@section('content')
  <section class="activity">
    <div class="container">
      <div class="section-heading text-center">
        <h2>Our Activities</h2>
        <p>Decades of experience and a great team- what we do, where we go make us unforgettable.</p>
      </div>
      <div class="activity__wrap">
        <div class="row no-gutters">
          @foreach($activities as $k=>$a)
            <div class="col-md-4">
              <div class="activity__wrap--list">
                <a href="{{url('/activity')}}/{{$a->slug}}">
                  <figure>
                    <img src="{{url('storage/images/thumbnail')}}/{{$a->thumbnail}}" alt="{{$a->name}}">
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
          <div class="col-md-4">
            <div class="activity__wrap--list">
              <a href="{{url('tailor-made-trip')}}">
                <figure>
                  <img src="{{url('frontend/images/')}}/tailormade.jpg" alt="{{$a->name}}">
                  <figcaption class="activity__wrap--caption">
                      <div>
                      Tailor Made Trips
                      </div>
                  </figcaption>
                </figure>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="what-we-do">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center">
          <img src="{{url('storage/images')}}/{{$service->image}}" alt="{{$service->title}}" class="w-75">
        </div>
        <div class="col-md-6">
          <h3>{{$service->title}}</h3>
          <div class="pb-3">
            {!!$service->description!!}
          </div>
          <a href="{{url('services')}}" class="more more__ghost mt-3">Read in Depth</a>
        </div>
      </div>
    </div>
  </section>
  @include('frontend.components.metadatas')
  <section class="tailormadetrip">
    <div class="container">
      <div class="tailormadetrip__detail">
        <h2>Tailor Made Trip</h2>
        <p>The itineraries that we have listed on our website are just the most popular ones, but it does not mean we only operate such fixed programs. On these essential routes, we give you exciting opportunities to create, add or combine your own tailor-made itineraries to our tours.</p>
        <a href="{{route('trip')}}" class="btn btn-ghost">read more</a>
      </div>
    </div>
  </section>
  <section class="instagram">
    <div class="section-heading text-center">
      <h2>#uncoverhimalaya</h2>
      <p>Follow our instagram handle <a href="https://www.instagram.com/{{$settings->instagram}}" target="_blank">{{"@"}}{{$settings->instagram}}</a> to see wonders of Nepal</p>
    </div>
    @include('frontend.components.instagram')
  </section>
  <section class="promovideo">
    <div class="container">
      <div class="section-heading text-center">
        <h2>Promo Video</h2>
        <p>Follow our <a href="https://www.youtube.com/{{$settings->youtube}}" target="_blank">YouTube</a> channel for sneak peak of Himalayas.</p>
      </div>
      <div class="video__wrap promovideo__wrap">
        <iframe width="560" height="215" src="https://www.youtube.com/embed/{{$settings->promovideo}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>
  <section class="socialwelfare">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <h2>Social Welfare</h2>
          <p>We are not just a company for adventurous trekkers, for us giving back to the community is just as important. We have partnered with international social companies to do as much social work as we can in different parts of Nepal</p>
        </div>
      </div>
    </div>
  </section>
  @include('frontend.components.testimonials')
  @include('frontend.components.readytoexplore')
@endsection
