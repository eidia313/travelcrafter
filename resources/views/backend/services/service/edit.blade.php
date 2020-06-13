@extends('backend.layouts.app')
@section('pageTitle', 'Edit Services')
@section('content')
{!! Form::model($service, ['method'=>'PUT', 'route'=>['service.update', $service->id], 'files' => true,
'enctype' => 'multipart/form-data']) !!}
@include('backend.services.service.partial.form', ['formMode' => 'edit'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
