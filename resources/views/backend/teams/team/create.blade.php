@extends('backend.layouts.app')
@section('pageTitle', 'Create Team Member')
@section('content')

{!! Form::open(['method'=>'POST', 'route'=>'team.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
<input type="hidden" name="_token" value="{{csrf_token()}}">
@include('backend.teams.team.partial.form', ['formMode' => 'create'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
