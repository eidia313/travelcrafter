@extends('frontend.layouts.app')
@section('pageTitle', $package->title)
@section('content')
<div class="banner">
  <div class="banner__image d-flex align-items-center">
    <img src="{{url('storage/images')}}/{{$package->cover_image}}" class="image-responsive" alt="{{$package->title}}">
    <div class="banner__title">
      <h1>{{$package->title}}</h1>
    </div>
  </div>
</div>
<div class="package__meta">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-md-2">
        <div class="d-flex align-items-center">
          <div class="package__difficulty">
            <div class="package__duration">
              <span>{{count($itinerary)}} Days</span>
              <span>{{count($itinerary)-1}} Nights</span>
            </div>
          </div>
          <div class="package__metas">
            <dl class="package__metas--list">
              <div>
                <dt>Destination</dt>
                <dd>{{$package->country->name}}</dd>
              </div>
              <div>
                <dt>Region</dt>
                <dd>{{$package->region->name}}</dd>
              </div>
              <div>
                <dt>Type</dt>
                <dd>{{$package->activity->name}}</dd>
              </div>
              <div>
                <dt>Max Altitude</dt>
                <dd>{{$package->altitude}}</dd>
              </div>
              <div>
                <dt>Best Season</dt>
                <dd>{{$package->best_season}}</dd>
              </div>
              <div>
                <dt>Accomodation</dt>
                <dd>{!! $package->accomodation !!}</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="package__tab tab">
  <div class="container">
    <div class="tab__list">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview">Overview</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="itinerary-tab" data-toggle="tab" href="#itinerary">Itinerary</a>
        </li>
        @if(count($packageGallery) > 0)
        <li class="nav-item">
          <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery">Gallery</a>
        </li>
        @endif
        @if(count($checkListGroup) > 0)
        <li class="nav-item">
          <a class="nav-link" id="checklist-tab" data-toggle="tab" href="#checklist">Checklist</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>

<div class="package__details tab">
  <div class="container">
    <div class="tab-content">
      <div class="tab-pane fade show active" id="overview">
        <div class="row">
          <div class="col-lg-8">
            <div class="package__desc">
              {!! $package->description !!}
            </div>
          </div>
          <div class="col-lg-4">
            <div class="package__contact">
              <div class="package__contact--whatsapp">
                <h5>WhatsApp:</h5>
                <p>+977-{{$settings->phonenumber}}</p>
              </div>
              <div class="package__contact--email">
                <h5>Email Address</h5>
                <p>{{$settings->email}}</p>
              </div>
              <a href="{{route('packagebooking.index')}}/{{$package->slug}}" class="btn btn-secondary btn-fw package__book">Inquiry/Book</a>
            </div>
            <a href="#" class="btn"></a>
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="itinerary">
        <div class="row">
          <div class="col-lg-8">
            <h4>Detailed Itinerary</h4>
            <div class="package__itinerary">
              <div id="iti-accordion" class="accordion">
                @foreach($itinerary as $k=>$i)
                <div class="package__itinerary--list">
                  <div id="itihead">
                    <div class="package__itinerary--head d-flex align-items-center" data-toggle="collapse" data-target="#iti-{{$i['day']}}">
                      <div>
                      <span class="package__itinerary--day">Day {{$i['day']}}</span>
                      </div>
                      <div>
                      <span>{{$i['title']}}</span>
                      <div>
                      <span><i class="hct-activity-type"></i> {{$i['mode']}}</span>
                      <span><i class="hct-deadline"></i> {{$i['duration']}}</span>
                      <span><i class="hct-max-altitude"></i> {{$i['altitude']}}m</span>
                      </div>
                      </div>
                    </div>
                  </div>
                  @if($k == 0)
                  <div id="iti-{{$i['day']}}" class="collapse" data-parent="#iti-accordion">
                  @else
                  <div id="iti-{{$i['day']}}" class="collapse" data-parent="#iti-accordion">
                  @endif
                  </div>
                </div>
                @endforeach
            </div>
          </div>
          </div>
          <div class="col-lg-4">
            <div class="package__contact">
              <div class="package__contact--whatsapp">
                <h5>WhatsApp:</h5>
                <p>+977-{{$settings->phonenumber}}</p>
              </div>
              <div class="package__contact--email">
                <h5>Email Address</h5>
                <p>{{$settings->email}}</p>
              </div>
              <a href="{{route('packagebooking.index')}}/{{$package->slug}}" class="btn btn-secondary btn-fw package__book">Inquiry/Book</a>
            </div>
          </div>
      </div>
      </div>

      @if(count($packageGallery) > 0)
      <div class="tab-pane fade" id="gallery">
        <div class="row">
          <div class="col-12">
            <div class="gallery-container">
              @foreach($packageGallery as $gallery)
                <div class="gallery-item" data-index="{{$loop->iteration}}">
                  <img src="{{url('storage/images')}}/{{$gallery->image}}" alt="{{$gallery->caption}}">
                </div>
              @endforeach

            </div>

          </div>
        </div>
      </div>
      @endif
      @if(count($checkListGroup) > 0)
      <div class="tab-pane fade" id="checklist">
        <div class="d-flex flex-wrap">
          <?php
          foreach($checkListCat as $c){
            if(array_key_exists(str_slug($c->name, ''), $checkListGroup)){
          ?>
          <div class="flex-1 p-3">
            <h5>{{$c->name}}</h5>
            <ul>
            @foreach($checkListGroup[str_slug($c->name, '')] as $e)
              <li>{{$e}}</li>
            @endforeach
            </ul>
          </div>
          <?php
            }
          }
          ?>
        </div>
          <?php
            // print_r($checkListCat);



          ?>

      </div>
      @endif
    </div>
  </div>
</div>
</div>
@include('frontend.components.cantfindtrip')
@if(count($relatedPackages) > 0)
<section class="recommended__trips">
  <div class="section-heading text-center">
    <h2>Recommended Trips</h2>
  </div>
  <div class="container">
    <div class="row ">
      @foreach($relatedPackages as $p)
        <div class="col-12 col-sm-12 col-lg-4 mb-10">
          <div class="package__item">
            <figure>
              <img src="{{url('storage/images')}}/{{$p->cover_image}}" alt="{{$p->title}}">
            </figure>
            <div class="package__item--det">
              <h3>
                <a href="{{url('package')}}/{{$p->slug}}">{{$p->title}}</a>
              </h3>
              <span class="package__item--region">{{$p->region->name}}</span>
            </div>
            <div class="package__item--meta d-inline-flex">
              <div class="package__item--days">
                <span class="package__item--days--title">Duration</span>
                <span class="package__item--days--value">{{sizeof(json_decode($p->itenerary))}} Days</span>
              </div>
              <div class="package__item--difficulty">
                <span class="package__item--difficulty--title">Difficulty</span>
                <span class="package__item--difficulty--value">Strenous</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>
@endif
@endsection

@section('js')
  <script type="text/javascript">
    $('#iti-accordion').collapse();
  </script>

  <script src="{{ asset('frontend/js/gallery.js') }}"></script>
@endsection
