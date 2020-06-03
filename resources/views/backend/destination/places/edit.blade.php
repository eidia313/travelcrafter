@extends('backend.layouts.app')
@section('pageTitle', 'Edit Leisure Activity')
@section('content')

    @include('partials.messages')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{route('leisure.update',$place->id)}}"  enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="_method" value="PUT">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $place->name }}" class="form-control" placeholder="Place Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="editor form-control" name="description" rows="3">{{$place->description}}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city_id" class="form-control js-example-basic-single" required>

                                        @foreach($countries as $country)

                                            <optgroup label="{{$country->name}}">
                                                @forelse($country->cities as $city)
                                                    <option value="{{$country->id}},{{$city->id}}"  {{ $place->country_id == $country->id  && $place->city_id == $city->id ? 'selected' : '' }}> {{$country->name}} : {{$city->name}}</option>
                                                @empty
                                                    <p class="text-center">Zero Regions</p>
                                                @endforelse

                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="place_type_id" class="form-control" required>
                                        @foreach($placetype as $pt)
                                          <option value="{{$pt->id}}"  {{ $place->place_type_id == $pt->id ? 'selected' : 'notselected'}}>{{$pt->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Altitude</label>
                                    <input type="text" name="altitude" value="{{ $place->altitude }}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label>Upload Image</label>

                                    @if($place->image)
                                        <div class="cover_image">
                                            <img id="show_cover_image" src="{{URL::to('/storage/images/'.$place->image)}}" alt="{{$place->name}}" width="200">
                                        </div>
                                    @endif

                                    <input id="cover_image" type="file" name="image">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log(reader);
                reader.onload = function(e) {
                    $('#show_cover_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#cover_image").change(function() {
            readURL(this);
        });
    </script>
@endsection
