@extends('backend.layouts.app')
@section('pageTitle', 'Create Package')
@section('tabs')
<nav>
    <div class="nav" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details">Details</a>
        <a class="nav-item nav-link" id="nav-itinerary-tab" data-toggle="tab" href="#nav-itinerary">Itinerary</a>
        <a class="nav-item nav-link" id="nav-triphighlight-tab" data-toggle="tab" href="#nav-triphighlight">Trip
            Highlight</a>
    </div>
</nav>
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        @include('partials.messages')
    </div>
</div>

{!! Form::open(['method'=>'POST', 'route'=>'package.store', 'files' => true, 'enctype' =>
'multipart/form-data',
'id' => 'packageform']) !!}
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-details">
        @include('backend.packages.package.partial.detail', ['formMode' => 'create'])
    </div>
    <div class="tab-pane fade" id="nav-itinerary">
        @include('backend.packages.package.partial.itinerary')

    </div>
    <div class="tab-pane fade" id="nav-triphighlight">
        @include('backend.packages.package.partial.highlight')
    </div>
</div>
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
@endsection
