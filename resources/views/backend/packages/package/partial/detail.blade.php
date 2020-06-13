<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter Title...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Description') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control editor', 'placeholder'=>'Package
                    Introduction...'])
                    !!}
                </div>
                <div class="row form-group">
                    <div class="col-12 col-sm-6 col-md-6">
                        {!! Form::label('Activity') !!}
                        {!! Form::select('activity_id', $activity, null, ['class'=> 'form-control']) !!}

                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        {!! Form::label('difficulty') !!}
                        {!! Form::select('difficulty', $difficulty, null, ['class'=> 'form-control']) !!}

                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12 col-sm-6 col-md-6">
                        {!! Form::label('Region') !!}
                        {!! Form::select('region_id', $region, null, ['class'=> 'form-control']) !!}

                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        {!! Form::label('Destination') !!}
                        {!! Form::select('country_id', $country, null, ['class'=> 'form-control']) !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">Upload Image</div>
                <div class="text-center img-preview">
                    @if(isset($package->cover_image))
                    <img id="preview" src="{{ asset('storage/images/'.$package->cover_image) }}"
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

        <div class="card mb-2">
            <div class="card-body">
                <div class="row m-0">
                    {!! Form::label('Best Selling', null, ['class' => 'mb-0 mr-2']) !!}
                    {!! Form::checkbox('isBestSelling', null) !!}
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row m-0">
                    {!! Form::label('Status') !!}
                    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row m-0">
                    {!! Form::button($formMode === 'edit' ? 'Update' : 'Publish', ['type'=>'submit', 'class' => 'btn
                    btn-secondary btn-sm col-md-6']) !!}
                    <a href="{{route('package.index')}}" class="btn btn-primary col-md-6">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
