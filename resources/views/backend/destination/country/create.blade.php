@extends('backend.layouts.app')
@section('pageTitle', 'Create Country')
@section('content')

{!! Form::open(['method'=>'POST', 'route'=>'country.store', 'files' => true, 'enctype' =>
'multipart/form-data']) !!}
@include('backend.destination.country.partial.form', ['formMode' => 'create'])
{!! Form::close() !!}

@endsection
@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
