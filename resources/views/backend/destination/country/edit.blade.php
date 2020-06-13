@extends('backend.layouts.app')
@section('pageTitle', 'Edit Country')
@section('content')
{!! Form::model($country, ['method'=>'PUT', 'route'=>['country.update', $country->id], 'files' => true,
'enctype' => 'multipart/form-data']) !!}

@include('backend.destination.country.partial.form', ['formMode' => 'edit'])

{!! Form::close() !!}
@endsection
@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
