<div class="row">
    <div class="col-12">
        @include('partials.messages')
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <input type="hidden" name="activity_id" value="{{ $placesActivity->id }}" />
                <div class="row form-group">
                    <div class="col-12">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ isset($place) ? $place->name : '' }}"
                            class="form-control" placeholder="Place Name" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12">
                        <label>Description</label>
                        <textarea class="editor form-control" name="description"
                            rows="3">{{ isset($place) ? $place->description : '' }}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12 col-sm-6 col-md-6">
                        <label>City</label>
                        <select name="city_id" class="form-control js-example-basic-single" required>
                            @foreach($countries as $country)
                            <optgroup label="{{$country->name}}">
                                @forelse($country->cities as $city)
                                <option value="{{$country->id}},{{$city->id}}"
                                    {{ isset($place) ?? $place->country_id == $country->id  && $place->city_id == $city->id  ? 'selected = selected' : '' }}>
                                    {{$country->name}} : {{$city->name}}</option>
                                @empty
                                <p class="text-center">Zero Regions</p>
                                @endforelse
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <label>Type</label>
                        <select name="place_type_id" class="form-control" required>
                            @foreach($placetype as $pt)
                            <option value="{{$pt->id}}"
                                {{ isset($place) ?? $place->place_type_id === $pt->id ? 'selected = selected' : '' }}>
                                {{$pt->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!--Region-->
                <div class="row form-group">
                    <div class="col-12 col-sm-6 col-md-6">
                        <label>Region</label>
                        <select name="region_id" class="form-control" required>
                            @foreach($regions as $region)
                            <option value="{{$region->id}}"
                                {{ isset($place) ?? $place->region_id == $region->id ? 'selected = selected' : '' }}>
                                {{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <label>Altitude</label>
                        <input type="text" name="altitude" value="{{ old('altitude') }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">Image</div>
                <div class="text-center img-preview">
                    @if(isset($place->cover_image))
                    <img id="preview" src="{{ asset('storage/images/'.$place->cover_image) }}"
                        class="img-fluid" /><br />
                    @else
                    <img id="preview" src="{{ asset('backend/images/noimage.jpg') }}" width="100%" height="220" /><br />
                    @endif

                    <input type="file" name="cover_image" id="image" class="d-none">

                    <a href="javascript:changeImage()">Change</a> |
                    <a style="color: red" href="javascript:removeImage()">Remove</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row m-0">
                    {!! Form::button($formMode === 'edit' ? 'Update' : 'Publish', ['type'=>'submit', 'class' => 'btn
                    btn-secondary btn-sm col-md-6']) !!}
                    <a href="{{route('place.index', $placesActivity->slug)}}"
                        class="btn btn-primary col-md-6">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
