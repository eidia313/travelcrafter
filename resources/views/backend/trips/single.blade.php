@extends('backend.layouts.app')
@section('pageTitle', 'Trip Detail')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card ">
                <div class="card-body fw-500">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Destination</h4>
                        </div>
                        <div class="col-md-6">
                                <p>{{$trip->destination->name}}
                                </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Full Name</h4>
                        </div>
                        <div class="col-md-6">
                                <p>{{$trip->full_name}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Email</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->email}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Phone</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->phone}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Activities</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="#" target="_blank">
                                @forelse($trip->activity as $activity)
                                    <span class="badge badge-secondary">{{$activity->name}}</span>

                                @empty
                                    <p class="text-center">Undefined</p>
                                @endforelse
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Trip Travel Date</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{ date('M j ,Y',strtotime($trip->date))}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Month/Season</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->season}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Duration</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->duration}}</p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Adults</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->adults}}</p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Children</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->children}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Hotel Class</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->hotel_class}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Interest</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->interest}}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Nationality</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->nationality}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Contact Way</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->contact_way}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0">Found By</h4>
                        </div>
                        <div class="col-md-6">
                            <p>{{$trip->find_us}}</p>
                        </div>
                    </div>




                </div>
            </div>

        </div><!-- /.panel-->
    </div><!-- /.col-->
@endsection