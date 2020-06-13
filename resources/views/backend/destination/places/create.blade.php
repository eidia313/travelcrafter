@extends('backend.layouts.app')
@section('pageTitle', 'Add '.ucfirst($activity).' Activity')
@section('content')

@include('partials.messages')

@if(!empty($placesActivity))
<form method="post" action="{{route('place.store', $activity)}}" enctype="multipart/form-data">
    @csrf
    @include('backend.destination.places.partial.form', ['formMode' => 'create'])
</form>
@else
<div class="content__nodata">
    <p>There is no mountaineering activity available. <a href="{{route('activity.create')}}">Create One</a> Now!</p>
</div>
@endif
@endsection

@section('js')
<script src="{{ asset('backend/js/image.js') }}"></script>
<script src="{{asset('backend/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
</script>
@endsection
