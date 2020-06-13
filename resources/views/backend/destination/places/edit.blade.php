@extends('backend.layouts.app')
@section('pageTitle', 'Edit '.ucfirst($activity).' Activity')
@section('content')

<form method="post" action="{{route('place.update',[$activity, $place->id])}}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="_method" value="PUT">
    @include('backend.destination.places.partial.form', ['formMode' => 'edit'])

</form>
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
