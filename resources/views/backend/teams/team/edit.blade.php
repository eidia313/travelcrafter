@extends('backend.layouts.app')
@section('pageTitle', 'Edit Team Members')
@section('content')
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
  <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                {!! Form::model($team, ['method'=>'PUT', 'route'=>['team.update', $team->id], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @include('backend.teams.team.partial.form')
                    <div class="form-actions">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="{{route('team.index')}}" class="btn btn-primary">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
