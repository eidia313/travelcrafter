@extends('backend.layouts.app')
@section('pageTitle', 'Edit Country')
@section('content')
  <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                {!! Form::model($country, ['method'=>'PUT', 'route'=>['country.update', $country->id], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @include('backend.destination.country.partial.form')
                    <div class="form-actions">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="{{route('country.index')}}" class="btn btn-primary">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
