@extends('backend.layouts.app')
@section('pageTitle', 'Edit Activity')
@section('content')
{!! Form::model($welfare, ['method'=>'PUT', 'route'=>['welfare.update', $welfare->id], 'files' => true,
'enctype' => 'multipart/form-data']) !!}
@include('backend.welfares.welfare.partial.form', ['formMode' => 'edit'])
{!! Form::close() !!}
@endsection


@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
