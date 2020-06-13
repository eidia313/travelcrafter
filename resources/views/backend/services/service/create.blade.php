@extends('backend.layouts.app')
@section('pageTitle', 'Create Services')
@section('content')
{!! Form::open(['method'=>'POST', 'route'=>'service.store', 'files' => true, 'enctype' =>
'multipart/form-data']) !!}
@include('backend.services.service.partial.form', ['formMode' => 'create'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
