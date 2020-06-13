@extends('backend.layouts.app')
@section('pageTitle', 'Create Activity')
@section('content')

{!! Form::open(['method'=>'POST', 'route'=>'activity.store', 'files' => true, 'enctype' =>
'multipart/form-data']) !!}
@include('backend.activities.activity.partial.form', ['formMode' => 'create'])
{!! Form::close() !!}

@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
