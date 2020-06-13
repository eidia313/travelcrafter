@extends('backend.layouts.app')
@section('pageTitle', 'Create Page')

@section('content')
{!! Form::open(['route' => 'pages.store', 'files'=> true]) !!}
@include ('backend.pages.partials.form', ['formMode' => 'create'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
