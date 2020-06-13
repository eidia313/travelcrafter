@extends('backend.layouts.app')
@section('pageTitle', 'Create Place Type')
@section('content')
{!! Form::open(['method'=>'POST', 'route'=>['placetype.store', $activity]]) !!}
@include('backend.places.placetype.partial.form', ['formMode' => 'create'])
{!! Form::close() !!}
@endsection
