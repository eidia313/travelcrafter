@extends('backend.layouts.app')
@section('pageTitle', 'Add Partners')
@section('content')
@if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="row">
    <div class="col-md-7">
      @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
      @endif

        <div class="card">
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'route'=>'clist.store']) !!}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @include('backend.contact.list.partial.form')
                <div class="form-actions">
                    <button type="submit" class="btn btn-secondary">Update</button>
                    <a href="{{route('clist.index')}}" class="btn btn-primary">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
