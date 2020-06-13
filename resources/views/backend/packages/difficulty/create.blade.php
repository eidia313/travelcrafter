@extends('backend.layouts.app')
@section('pageTitle', 'Set Difficulty')

@section('content')
{!! Form::open(['method'=>'POST', 'route'=>'difficulty.store', 'files' => true, 'enctype' =>
'multipart/form-data', 'id' => 'difficultyform']) !!}
@include('backend.packages.difficulty.partial.form', ['formMode' => 'create'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
