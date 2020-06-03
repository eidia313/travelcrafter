@extends('backend.layouts.app')
@section('pageTitle', 'Edit City')
@section('content')
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
  <div class="row">
      <div class="col-md-7">
          <div class="card">
              <div class="card-body">
                  {!! Form::model($city, ['method'=>'PUT', 'route'=>['city.update', $city->id]]) !!}
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      @include('backend.destination.city.partial.form')
                      <div class="form-actions">
                          <button type="submit" class="btn btn-secondary">Update</button>
                          <a href="{{route('city.index')}}" class="btn btn-primary">Cancel</a>
                      </div>
                  {!! Form::close() !!}
              </div>
          </div>
      </div>
    </div>
@endsection
