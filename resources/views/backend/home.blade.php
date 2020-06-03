@extends('backend.layouts.app')
@section('pageTitle', 'Dashboard')
@section('content')
  <h2>Welcome back {{ Auth::user()->name }}!</h2>
@endsection
