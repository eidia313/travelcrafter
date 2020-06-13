@extends('backend.layouts.app')
@section('pageTitle', 'Edit Activity')
@section('content')
{!! Form::model($activity, ['method'=>'PUT', 'route'=>['activity.update', $activity->id], 'files' =>
true, 'enctype' => 'multipart/form-data']) !!}
@include('backend.activities.activity.partial.form', ['formMode' => 'edit'])
{!! Form::close() !!}
@endsection
@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
