@extends('backend.layouts.app')
@section('pageTitle', 'Edit Place Type')
@section('content')

{!! Form::model($placetype, ['method'=>'PUT', 'route'=>['placetype.update', $activity,
$placetype->id]]) !!}
@include('backend.places.placetype.partial.form', ['formMode' => 'edit'])
{!! Form::close() !!}

@endsection
