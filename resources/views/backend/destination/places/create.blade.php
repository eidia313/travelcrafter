@extends('backend.layouts.app')
@section('pageTitle', 'Add Leisure Activity')
@section('content')

    @include('partials.messages')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('leisure.store')}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Place Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="editor form-control" name="description" rows="3">{{old('description')}}</textarea>
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
                                                    <option value="{{$country->id}},{{$city->id}}"  {{ old('city_id') == $country->id,$city->id ? 'selected' : '' }}> {{$country->name}} : {{$city->name}}</option>
                                                @empty
                                                    <p class="text-center">Zero Regions</p>
                                                @endforelse
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Place Type -->

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="place_type_id" class="form-control" required>
                                        @foreach($placetype as $pt)
                                          <option value="{{$pt->id}}"  {{ old('place_type_id') == $pt->id ? 'selected' : '' }}>{{$pt->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Altitude</label>
                                    <input type="text" name="altitude" value="{{ old('altitude') }}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Submit</button>
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
@endsection
