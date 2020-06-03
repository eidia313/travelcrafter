@extends('backend.layouts.app')
@section('pageTitle', 'Site Settings')
@section('content')
@if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="row">
    <div class="col-md-5">
      {{-- {{$errors->first('name')}} --}}
     {{--  @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
      @endif --}}
      {!! Form::open(['method'=>'POST', 'route'=>'setting.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @include('backend.settings.partial.form')
      <div class="form-actions">
          <button type="submit" class="btn btn-secondary">Update</button>
          <a href="{{route('activity.index')}}" class="btn btn-link">Cancel</a>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
