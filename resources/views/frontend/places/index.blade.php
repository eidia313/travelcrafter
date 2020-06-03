@extends('frontend.layouts.app')
@section('pageTitle', 'All Places')
@section('content')
    <main id="main">
        <div class="banner">
            <div class="banner__image">
                <figure>
                    <img src="{{URL::to('/storage/images/'.$country->cover_image)}}" alt="{{$country->name}}">
                </figure>
                <div class="banner__title">
                    <h1>{{$country->name}}</h1>
                </div>
            </div>
        </div>

        <section class="recommended-trips">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Sights and Places</h3>
                    </div>
                </div>
                <div class="row ">
                    @foreach($countryPlaces as $place)
                        <div class="col-12 col-sm-12 col-lg-4 mb-10">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{url('storage/images')}}/{{$place->image}}" alt="{{$place->name}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$place->name}}</h5>
                                    <p>Altitude: {{$place->altitude}}</p>
                                    <p>{{$place->city_id ? $place->city->name : ''}}</p>
                                    <p class="card-text">{!! str_limit(strip_tags($place->description), 80) !!}</p>
                                    <a href="#" class="btn btn-primary btn-block">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                    <a href="#" class="btn btn-primary view-btn" role="button">
                       View All Places
                    </a>

            </div>
        </section>

        <div class="activity__list">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Activities</h3>
                    </div>
                </div>
            <div class="row">
                @foreach($countryActivities as $k=>$a)
                    <div class="{{$k < 4 ? 'col-lg-3' : 'col-lg-4'}}">
                        <a href="{{url('activity')}}/{{$a->slug}}" class="activity__single">
                            <figure>
                                <img src="{{url('storage/images')}}/{{$a->image}}" alt="{{$a->name}}">
                            </figure>
                            <h3>{{$a->name}}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </div>

        <div id="mapid"></div>
    </main>

@endsection

@section('js')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
    <script>
        $(document).ready(function () {
            const $countryLatitude = "{{$country->latitude}}";
            const $countryLongitude = "{{$country->longitude}}";

            $countryRegions = {!! $countryRegions->toJson() !!};

            var mymap = L.map('mapid').setView([$countryLatitude,$countryLongitude], 7);


                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom:18 ,
                    id: 'mapbox.streets',
                    accessToken: 'pk.eyJ1IjoicHJhandhbHNpd2Frb3RpIiwiYSI6ImNqdXVyYTBtZTBscWQ0ZG1oaW50cm0yODUifQ.y-y09N3NiK2P0-lhN6aH3g'
                }).addTo(mymap);


            function  setMarker(packages,region){
                L.marker([region.latitude,region.longitude]).addTo(mymap).bindPopup("<b>"+region.name+"</b><br><ul>"+packages+"</ul>");
            }

            function getRegionPackages(region) {
                $.ajax(
                    {
                        type: 'GET',
                        url: '/region/packages/'+ region.id,
                        datatype: "html",
                    }).done(function (data) {
                   setMarker(data,region);
                }).fail(function (jqXHR, ajaxOptions, thrownError) {
                   /* console.log("Error: " + errorThrown);
                    console.log("Status: " + status);
                    console.dir(xhr);*/
                });

            }

            $countryRegions.forEach(function (region) {
                 getRegionPackages(region);

            });




        });

    </script>
@endsection