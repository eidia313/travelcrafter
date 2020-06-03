@extends('backend.layouts.app')
@section('pageTitle', 'Edit FAQ')

@section('content')
    {!! Form::model($faq, [
        'method'    =>  'PUT',
        'url' => ['admin/faq', $faq->id]
        ]) !!}
        @include ('backend.faq.form', ['formMode' => 'edit'])
    {!! Form::close() !!}
@endsection
