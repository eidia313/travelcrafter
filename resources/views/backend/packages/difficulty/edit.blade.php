@extends('backend.layouts.app')
@section('pageTitle', 'Edit Difficulty')

@section('content')
{!! Form::model($difficulty, ['method'=>'PUT', 'route'=>['difficulty.update', $difficulty->id], 'files' => true,
'enctype' => 'multipart/form-data']) !!}
@include('backend.packages.difficulty.partial.form', ['formMode' => 'edit'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
