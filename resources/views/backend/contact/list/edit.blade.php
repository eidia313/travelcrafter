@extends('backend.layouts.app')
@section('pageTitle', 'Edit Parters')
@section('content')
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
  <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                {!! Form::model($partner, ['method'=>'PUT', 'route'=>['clist.update', $partner->id]]) !!}
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
