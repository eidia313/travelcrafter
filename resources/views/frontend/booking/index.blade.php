@extends('frontend.layouts.app')
@section('pageTitle', 'Booking')
@section('content')
@if(isset($selectedPackage))
<section class="page__header page__booking d-flex flex-column align-items-center justify-content-center text-center">
  <img src="{{url('storage/images/')}}/{{$selectedPackage->cover_image}}" class="page__image" alt="{{$selectedPackage->title}}">
  <h1>{{$selectedPackage->title}}</h1>
</section>
<div class="content-area p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 mx-auto">
                    @if(count($errors) > 0)
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    {!! Form::open(['method'=>'POST', 'route'=>['packagebooking.store']]) !!}
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h3>Booking Information</h3>
                            <div class="form-group">
                                {!! Form::hidden('package', $selectedPackage->title, $attributes = $errors->has('package') ? ['class' => 'form-control is-invalid'] :['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('trip_start_date', 'Trip Start Date', ['class' => 'control-label']) !!}

                                    {!! Form::date('trip_start_date', isset($startDate)? $startDate: null, $attributes = $errors->has('trip_start_date') ? ['class' => 'form-control is-invalid'] :['class' => 'form-control']) !!}
                                    @if($errors->has('trip_start_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('trip_start_date') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    {!! Form::label('trip_end_date', 'Trip End Date', ['class' => 'control-label']) !!}
                                    {!! Form::date('trip_end_date',isset($endDate)? $endDate: null, $attributes = $errors->has('trip_end_date') ? ['class' => 'form-control is-invalid'] :['class' => 'form-control']) !!}
                                    @if($errors->has('trip_start_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('trip_start_date') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('people_num', 'Number of People', ['class' => 'control-label']) !!}
                                    {!! Form::text('people_num', null, $attributes = $errors->has('people_num') ? ['class' => 'form-control is-invalid'] :['class' => 'form-control']) !!}
                                    @if($errors->has('people_num'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('people_num') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('Full Name', 'Full Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('full_name', null, $attributes = $errors->has('full_name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                    @if($errors->has('full_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('full_name') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('dob', 'Date of Birth', ['class' => 'control-label']) !!}
                                    {!! Form::date('dob', null, $attributes = $errors->has('dob') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                    @if($errors->has('dob'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('dob') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
                                    {!! Form::text('country', null, $attributes = $errors->has('country') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                    @if($errors->has('country'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
                                    {!! Form::text('city', null, $attributes = $errors->has('city') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                    @if($errors->has('city'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                                    {!! Form::email('email', null, $attributes = $errors->has('email') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('phone_num', 'Phone Number', ['class' => 'control-label']) !!}
                                    {!! Form::text('phone_num', null, $attributes = $errors->has('phone_num') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                </div>

                                <div class="col-md-6">
                                    {!! Form::label('mobile_num', 'Mobile Number', ['class' => 'control-label']) !!}
                                    {!! Form::text('mobile_num', null, $attributes = $errors->has('mobile_num') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    {!! Form::label('emergency_contact_name', 'Emergency Contact Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('emergency_contact_name', null, $attributes = $errors->has('emergency_contact_name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                    @if($errors->has('emergency_contact_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('emergency_contact_name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    {!! Form::label('relationship', 'Relationship', ['class' => 'control-label']) !!}
                                    {!! Form::text('relationship', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    {!! Form::label('emergency_phone', 'Emergency Phone Number', ['class' => 'control-label']) !!}
                                    {!! Form::text('emergency_phone', null, $attributes = $errors->has('emergency_phone') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                                    @if($errors->has('emergency_phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('emeregency_phone') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('mailing_address', 'Mailing Address', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('mailing_address', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::button('SUBMIT', ['type'=>'submit', 'class' => 'btn btn-info btn-sm btn-block']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
