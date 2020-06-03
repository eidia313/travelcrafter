@extends('backend.layouts.app')
@section('pageTitle', 'Edit Services')
@section('content')
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
  <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                {!! Form::model($service, ['method'=>'PUT', 'route'=>['service.update', $service->id], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @include('backend.services.service.partial.form')
                    <div class="form-actions">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="{{route('service.index')}}" class="btn btn-primary">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
