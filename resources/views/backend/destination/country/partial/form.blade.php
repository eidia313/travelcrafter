<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Country Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Latitude') !!}
                    {!! Form::text('latitude', null, ['class'=>'form-control', 'placeholder'=>'Latitude']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Longitude') !!}
                    {!! Form::text('longitude', null, ['class'=>'form-control', 'placeholder'=>'Longitude']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Status') !!}
                    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">Image</div>
                <div class="text-center img-preview">
                    @if(isset($country->cover_image))
                    <img id="preview" src="{{ asset('storage/images/'.$country->cover_image) }}"
                        class="img-fluid" /><br />
                    @else
                    <img id="preview" src="{{ asset('backend/images/noimage.jpg') }}" width="100%" height="220" /><br />
                    @endif
                    {{ Form::file('cover_image', ['id'=>'image','class'=>'d-none']) }}

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
                    <a href="{{route('country.index')}}" class="btn btn-primary col-md-6">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
