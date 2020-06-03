@extends('backend.layouts.app')
@section('pageTitle', 'Create Package')
@if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(!empty($error))
  <div>Error</div>
@endif
@section('tabs')
  <nav>
    <div class="nav" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details">Details</a>
      <a class="nav-item nav-link" id="nav-itinerary-tab" data-toggle="tab" href="#nav-itinerary">Itinerary</a>
      <a class="nav-item nav-link" id="nav-triphighlight-tab" data-toggle="tab" href="#nav-triphighlight">Trip Highlight</a>
    </div>
  </nav>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-5">
      {!! Form::open(['method'=>'POST', 'route'=>'package.store', 'files' => true,  'enctype' => 'multipart/form-data', 'id' => 'packageform']) !!}
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-details">
          @include('backend.packages.package.partial.detail')
        </div>
        <div class="tab-pane fade" id="nav-itinerary">
          @include('backend.packages.package.partial.itinerary')
          <button type="button" id="add-row" class="btn btn-secondary">Add</button>
        </div>
        <div class="tab-pane fade" id="nav-triphighlight">
          @include('backend.packages.package.partial.highlight')
        </div>
      </div>
      <div class="form-actions">
          <button type="submit" class="btn btn-secondary">Update</button>
          <a href="{{route('package.index')}}" class="btn btn-link">Cancel</a>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
