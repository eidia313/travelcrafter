@extends('backend.layouts.app')
@section('pageTitle', 'Edit Team Members')

@section('content')
{!! Form::model($team, ['method'=>'PUT', 'route'=>['team.update', $team->id], 'files' => true, 'enctype' =>
'multipart/form-data']) !!}
@include('backend.teams.team.partial.form', ['formMode' => 'edit'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
