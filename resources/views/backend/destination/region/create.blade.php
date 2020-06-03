@extends('backend.layouts.app')
@section('pageTitle', 'Create Region')
@section('content')
  <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'route'=>'region.store']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @include('backend.destination.region.partial.form')
                    <div class="form-actions">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="{{route('region.index')}}" class="btn btn-primary">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
