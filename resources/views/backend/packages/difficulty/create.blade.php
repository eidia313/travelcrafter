@extends('backend.layouts.app')
@section('pageTitle', 'Set Difficulty')

@section('content')
  <div class="row">
    <div class="col-md-7">
      @if ($errors->any())
          <div class="">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li class="alert alert-danger">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <div class="card">
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'route'=>'difficulty.store', 'files' => true,  'enctype' => 'multipart/form-data', 'id' => 'difficultyform']) !!}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @include('backend.packages.difficulty.partial.form')
                <div class="form-actions">
                    <button type="submit" class="btn btn-secondary">Update</button>
                    <a href="{{route('difficulty.index')}}" class="btn btn-primary">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
  </div>
@endsection
