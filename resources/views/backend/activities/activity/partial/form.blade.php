<div class="row">
    <div class="col-12">
        @include('partials.messages')
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Activity']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('desc', 'Description') !!}
                    {!! Form::textarea('desc', null, ['class' => 'form-control editor']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Include in Tailor Made?') !!}
                    {!! Form::checkbox('showontailor', null) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Status') !!}
                    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
                    @if($errors)
                    <span class="text-danger"><i>{{$errors->first('status')}}</i></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">Image</div>
                <div class="text-center img-preview">
                    @if(isset($activity->image))
                    <img id="preview" src="{{ asset('storage/images/'.$activity->image) }}" class="img-fluid" /><br />
                    @else
                    <img id="preview" src="{{ asset('backend/images/noimage.jpg') }}" width="100%" height="220" /><br />
                    @endif
                    {{ Form::file('image', ['id'=>'image','class'=>'d-none']) }}

                    <a href="javascript:changeImage()">Change</a> |
                    <a style="color: red" href="javascript:removeImage()">Remove</a>
                </div>
            </div>
        </div>
        <div class="card mb-2">

            <div class="card-body">
                <div class="card-title">Thumbnail</div>
                <div class="text-center img-preview">
                    @if(isset($activity->thumb))
                    <img id="preview-thumb" src="{{ asset('storage/images/'.$activity->thumb) }}"
                        class="img-fluid" /><br />
                    @else
                    <img id="preview-thumb" src="{{ asset('backend/images/noimage.jpg') }}" width="100%"
                        height="220" /><br />
                    @endif
                    {{ Form::file('thumb', ['id'=>'thumb','class'=>'d-none']) }}

                    <a href="javascript:changeThumb()">Change</a> |
                    <a style="color: red" href="javascript:removeThumb()">Remove</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row m-0">
                    {!! Form::button($formMode === 'edit' ? 'Update' : 'Publish', ['type'=>'submit', 'class' => 'btn
                    btn-secondary btn-sm col-md-6']) !!}
                    <a href="{{route('activity.index')}}" class="btn btn-primary col-md-6">Cancel</a>
                </div>
            </div>
        </div>

    </div>
</div>
