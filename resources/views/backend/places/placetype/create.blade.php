@extends('backend.layouts.app')
@section('pageTitle', 'Create Place Type')
@section('content')
  <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'route'=>'placetype.store']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @include('backend.places.placetype.partial.form')
                    <div class="form-actions">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="{{route('placetype.index')}}" class="btn btn-primary">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
