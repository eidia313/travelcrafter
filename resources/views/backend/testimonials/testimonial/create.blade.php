@extends('backend.layouts.app')
@section('pageTitle', 'Create Testimonial')
@section('content')

    @include('partials.messages')

  <div class="row">
    <div class="col-12">
      {{-- {{$errors->first('name')}} --}}
     {{--  @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
      @endif --}}
      {!! Form::open(['method'=>'POST', 'route'=>'testimonial.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
          @csrf
          @include('backend.testimonials.testimonial.partial.form', ['formMode' => 'create'])
      {!! Form::close() !!}
    </div>
  </div>
@endsection
