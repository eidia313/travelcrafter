@extends('backend.layouts.app')
@section('pageTitle', 'Create Welfare')
@section('content')
{!! Form::open(['method'=>'POST', 'route'=>'welfare.store', 'files' => true, 'enctype' =>
'multipart/form-data']) !!}
@include('backend.welfares.welfare.partial.form', ['formMode' => 'create'])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
