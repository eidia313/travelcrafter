@extends('frontend.layouts.app')
@section('pageTitle', $activity->name)
@inject('package_on_region', 'App\Http\Controllers\front\ActivityController')
@section('content')
<main id="main">
    <div class="banner">
        <div class="banner__image">
            <figure>
                <img src="{{url('storage/images')}}/{{$activity->image}}" alt="{{$activity->name}}">
            </figure>
            <div class="banner__title">
                <h1>{{$activity->name}}</h1>
            </div>
        </div>
    </div>
    <div class="package__meta">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    {!! $activity->desc !!}
                </div>
            </div>
        </div>
    </div>
    <div class="package__tab tab">
        <div class="container">
            <div class="tab__list">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" id="region-tab" data-toggle="tab" href="#region">Region</a>
                    </li>
                    @if(!empty($difficulty))
                    <li class="nav-item">
                        <a class="nav-link" id="difficulty-tab" data-toggle="tab" href="#difficulty">Difficulty</a>
                    </li>
                    @endif
                    @if(!empty($placetype))
                    <li class="nav-item">
                        <a class="nav-link" id="type-tab" data-toggle="tab" href="#type">Type</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" id="duration-tab" data-toggle="tab" href="#duration">Duration</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="package__details tab">
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="region">
                    <div class="package__desc">
                        <div class="tab">
                            <div class="tab__list tab__list--inner">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="all-region-tab" data-toggle="tab"
                                            href="#all-region">All</a>
                                    </li>
                                    @foreach($regions as $k=>$r)

                                    <li class="nav-item">
                                        <a class="nav-link" id="region-{{$k}}-tab" data-toggle="tab"
                                            href="#region-{{$k}}">{{$r->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="tab-content">
                                @if($activity->slug == 'mountaineering')

                                <div class="tab-pane fade show active" id="all-region">
                                    <div class="row">
                                        @foreach($activity->places as $p)
                                        <div class="col-lg-4 ">
                                            <div class="package__item">
                                                <figure>
                                                    <img src="{{url('storage/images')}}/{{$p->cover_image}}"
                                                        alt="{{$p->name}}">
                                                </figure>
                                                <div class="package__item--det">
                                                    <h3>
                                                        <a href="{{url('package')}}/{{$p->slug}}">{{$p->name}}</a>
                                                    </h3>
                                                    <span class="package__item--region">{{$p->region->name}}</span>
                                                </div>
                                                <div class="package__item--meta d-inline-flex">
                                                    <div class="package__item--days">
                                                        <span class="package__item--days--title">Altitude</span>
                                                        <span class="package__item--days--value">{{$p->altitude}}
                                                            m</span>
                                                    </div>
                                                    <div class="package__item--difficulty">
                                                        <span class="package__item--difficulty--title">Type</span>
                                                        <span
                                                            class="package__item--difficulty--value">{{ $p->placetype }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @foreach($regions as $k=>$r)
                                <div class="tab-pane fade" id="region-{{$k}}">
                                    <div class="row">
                                        @php
                                        $pack = $package_on_region::get_regions_activity($activity->id, $r->id);
                                        @endphp
                                        @foreach($pack as $pkg)
                                        <div class="col-lg-4 ">
                                            <div class="package__item">
                                                <figure>
                                                    <img src="{{url('storage/images')}}/{{$pkg->cover_image}}"
                                                        alt="{{$pkg->name}}">
                                                </figure>
                                                <div class="package__item--det">
                                                    <h3>
                                                        <a href="{{url('package')}}/{{$pkg->slug}}">{{$pkg->name}}</a>
                                                    </h3>
                                                    <span class="package__item--region">{{$r->name}}</span>
                                                </div>
                                                <div class="package__item--meta d-inline-flex">
                                                    <div class="package__item--days">
                                                        <span class="package__item--days--title">Altitude</span>
                                                        <span class="package__item--days--value">{{$pkg->altitude}}
                                                            m</span>
                                                    </div>
                                                    <div class="package__item--difficulty">
                                                        <span class="package__item--difficulty--title">Type</span>
                                                        <span
                                                            class="package__item--difficulty--value">{{ $p->placetype }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="tab-pane fade show active" id="all-region">
                                    <div class="row">

                                        @foreach($activity->packages as $p)
                                        <div class="col-lg-4 ">
                                            <div class="package__item">
                                                <figure>
                                                    <img src="{{url('storage/images')}}/{{$p->cover_image}}"
                                                        alt="{{$p->title}}">
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
                                                        <span
                                                            class="package__item--days--value">{{sizeof(json_decode($p->itenerary))}}
                                                            Days</span>
                                                    </div>
                                                    <div class="package__item--difficulty">
                                                        <span class="package__item--difficulty--title">Difficulty</span>
                                                        <span
                                                            class="package__item--difficulty--value">{{$p->difficulty->name}}</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @foreach($regions as $k=>$r)
                                <div class="tab-pane fade" id="region-{{$k}}">
                                    <div class="row">

                                        @php
                                        $pack = $package_on_region::get_regions_activity($activity->id, $r->id);
                                        @endphp
                                        @foreach($pack as $pkg)

                                        <div class="col-lg-4 ">
                                            <div class="package__item">
                                                <figure>
                                                    <img src="{{url('storage/images')}}/{{$pkg->cover_image}}"
                                                        alt="{{$pkg->title}}">
                                                </figure>
                                                <div class="package__item--det">
                                                    <h3>
                                                        <a href="{{url('package')}}/{{$pkg->slug}}">{{$pkg->title}}</a>
                                                    </h3>
                                                    <span class="package__item--region">{{$r->name}}</span>
                                                </div>
                                                <div class="package__item--meta d-inline-flex">
                                                    <div class="package__item--days">
                                                        <span class="package__item--days--title">Duration</span>
                                                        <span
                                                            class="package__item--days--value">{{sizeof(json_decode($pkg->itenerary))}}
                                                            Days</span>
                                                    </div>
                                                    <div class="package__item--difficulty">
                                                        <span class="package__item--difficulty--title">Difficulty</span>
                                                        <span
                                                            class="package__item--difficulty--value">{{$pkg->difficulty->name}}</span>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($difficulty))
                <div class="tab-pane fade" id="difficulty">
                    <div class="package__desc">
                        <div class="tab">
                            <div class="tab__list tab__list--inner">
                                <ul class="nav">
                                    @foreach($difficulty as $k=>$d)
                                    <li class="nav-item">
                                        <a class="nav-link {{$k==0 ? 'active': ''}}" id="difficulty-{{$k}}-tab"
                                            data-toggle="tab" href="#difficulty-{{$k}}">{{$d->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="tab-content">
                                @foreach($difficulty as $k=>$d)
                                <div class="tab-pane fade {{$k==0 ? 'show active': ''}}" id="difficulty-{{$k}}">
                                    <div class="row">
                                        @foreach($packages->where('difficulty_id', $d->id) as $pkg)
                                        <div class="col-lg-4">
                                            <div class="package__item">
                                                <figure>
                                                    <img src="{{url('storage/images')}}/{{$pkg->cover_image}}"
                                                        alt="{{$pkg->title}}">
                                                </figure>
                                                <div class="package__item--det">
                                                    <h3>
                                                        <a href="{{url('package')}}/{{$pkg->slug}}">{{$pkg->title}}</a>
                                                    </h3>
                                                    <span class="package__item--region">{{$pkg->region->name}}</span>
                                                </div>
                                                <div class="package__item--meta d-inline-flex">
                                                    <div class="package__item--days">
                                                        <span class="package__item--days--title">Duration</span>
                                                        <span
                                                            class="package__item--days--value">{{sizeof(json_decode($pkg->itenerary))}}
                                                            Days</span>
                                                    </div>
                                                    <div class="package__item--difficulty">
                                                        <span class="package__item--difficulty--title">Difficulty</span>
                                                        <span
                                                            class="package__item--difficulty--value">{{$pkg->difficulty->name}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty($placetype))
                <div class="tab-pane fade" id="type">
                    <div class="package__desc">
                        <div class="tab">
                            <div class="tab__list tab__list--inner">
                                <ul class="nav">
                                    @foreach($placetype as $k=>$d)

                                    <li class="nav-item">
                                        <a class="nav-link {{$k==0 ? 'active': ''}}" id="type-{{$k}}-tab"
                                            data-toggle="tab" href="#type-{{$k}}">{{$d->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="tab">
                            <div class="tab-content">
                                @foreach($placetype as $k=>$d)
                                <div class="tab-pane fade {{$k==0 ? 'show active': ''}}" id="type-{{$k}}">
                                    <div class="row">
                                        @foreach($packages->where('place_type_id', $d->id) as $pkg)
                                        <div class="col-lg-4">
                                            <div class="package__item">
                                                <figure>
                                                    <img src="{{url('storage/images')}}/{{$pkg->cover_image}}"
                                                        alt="{{$pkg->name}}">
                                                </figure>
                                                <div class="package__item--det">
                                                    <h3>
                                                        <a href="{{url('package')}}/{{$pkg->slug}}">{{$pkg->name}}</a>
                                                    </h3>
                                                    <span class="package__item--region">{{$pkg->region->name}}</span>
                                                </div>
                                                <div class="package__item--meta d-inline-flex">
                                                    <div class="package__item--days">
                                                        <span class="package__item--days--title">Altitude</span>
                                                        <span class="package__item--days--value">{{$pkg->altitude}}
                                                            m</span>
                                                        {{-- <span
                                                            class="package__item--days--value">{{sizeof(json_decode($pkg->itenerary))}}
                                                        Days</span> --}}
                                                    </div>
                                                    <div class="package__item--difficulty">
                                                        <span class="package__item--difficulty--title">Type</span>
                                                        <span
                                                            class="package__item--difficulty--value">{{$pkg->placetype}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="tab-pane fade" id="duration">
                    <div class="package__desc">
                        <div class="tab">
                            <div class="tab__list tab__list--inner">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="duration-ten-tab" data-toggle="tab"
                                            href="#duration-ten">Less
                                            than 10 days</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="duration-twenty-tab" data-toggle="tab"
                                            href="#duration-twenty">10 to
                                            20 days</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="duration-morethantwenty-tab" data-toggle="tab"
                                            href="#duration-morethantwenty">More than 20 days</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="duration-ten">
                                    <div class="row">
                                        @foreach($packages as $pkg)
                                        @if(sizeof(json_decode($pkg->itenerary)) < 10) <div class="col-lg-4">
                                            <div class="package__item">
                                                <figure>
                                                    <img src="{{url('storage/images')}}/{{$pkg->cover_image}}"
                                                        alt="{{$pkg->title}}">
                                                </figure>
                                                <div class="package__item--det">
                                                    <h3>
                                                        <a href="{{url('package')}}/{{$pkg->slug}}">{{$pkg->title}}</a>
                                                    </h3>
                                                    <span class="package__item--region">{{$pkg->region->name}}</span>
                                                </div>
                                                <div class="package__item--meta d-inline-flex">
                                                    <div class="package__item--days">
                                                        <span class="package__item--days--title">Duration</span>
                                                        <span
                                                            class="package__item--days--value">{{sizeof(json_decode($pkg->itenerary))}}
                                                            Days</span>
                                                    </div>
                                                    <div class="package__item--difficulty">
                                                        <span class="package__item--difficulty--title">Difficulty</span>
                                                        <span
                                                            class="package__item--difficulty--value">{{$pkg->difficulty->name}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="duration-twenty">
                                <div class="row">
                                    @foreach($packages as $pkg)
                                    @if(sizeof(json_decode($pkg->itenerary)) >= 10 &&
                                    sizeof(json_decode($pkg->itenerary)) < 20) <div class="col-lg-4">
                                        <div class="package__item">
                                            <figure>
                                                <img src="{{url('storage_old')}}/{{$pkg->cover_image}}"
                                                    alt="{{$pkg->title}}">
                                            </figure>
                                            <div class="package__item--det">
                                                <h3>
                                                    <a href="{{url('package')}}/{{$pkg->slug}}">{{$pkg->title}}</a>
                                                </h3>
                                                <span class="package__item--region">{{$pkg->region->name}}</span>
                                            </div>
                                            <div class="package__item--meta d-inline-flex">
                                                <div class="package__item--days">
                                                    <span class="package__item--days--title">Duration</span>
                                                    <span
                                                        class="package__item--days--value">{{sizeof(json_decode($pkg->itenerary))}}
                                                        Days</span>
                                                </div>
                                                <div class="package__item--difficulty">
                                                    <span class="package__item--difficulty--title">Difficulty</span>
                                                    <span
                                                        class="package__item--difficulty--value">{{$pkg->difficulty->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="duration-morethantwenty">
                            <div class="row">
                                @foreach($packages as $pkg)
                                @if(sizeof(json_decode($pkg->itenerary)) >= 20)
                                <div class="col-lg-4">
                                    <div class="package__item">
                                        <figure>
                                            <img src="{{url('storage_old')}}/{{$pkg->cover_image}}"
                                                alt="{{$pkg->title}}">
                                        </figure>
                                        <div class="package__item--det">
                                            <h3>
                                                <a href="{{url('package')}}/{{$pkg->slug}}">{{$pkg->title}}</a>
                                            </h3>
                                            <span class="package__item--region">{{$pkg->region->name}}</span>
                                        </div>
                                        <div class="package__item--meta d-inline-flex">
                                            <div class="package__item--days">
                                                <span class="package__item--days--title">Duration</span>
                                                <span
                                                    class="package__item--days--value">{{sizeof(json_decode($pkg->itenerary))}}
                                                    Days</span>
                                            </div>
                                            <div class="package__item--difficulty">
                                                <span class="package__item--difficulty--title">Difficulty</span>
                                                <span
                                                    class="package__item--difficulty--value">{{$pkg->difficulty->name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
    </div>
    </div>
</main>
@endsection

@section('script')
@endsection
