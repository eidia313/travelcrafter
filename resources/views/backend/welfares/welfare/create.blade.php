@extends('backend.layouts.app')
@section('pageTitle', 'Create Welfare')
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
      {{-- {{$errors->first('name')}} --}}
     {{--  @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
      @endif --}}

        <div class="card">
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'route'=>'welfare.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @include('backend.welfares.welfare.partial.form')
                <div class="form-actions">
                    <button type="submit" class="btn btn-secondary">Update</button>
                    <a href="{{route('welfare.index')}}" class="btn btn-primary">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
