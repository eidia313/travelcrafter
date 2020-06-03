@extends('backend.layouts.app')
@section('pageTitle', 'Edit Country')
@section('content')
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
  <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                {!! Form::model($country, ['method'=>'PUT', 'route'=>['ccountry.update', $country->id]]) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @include('backend.contact.country.partial.form')
                    <div class="form-actions">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="{{route('ccountry.index')}}" class="btn btn-primary">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
