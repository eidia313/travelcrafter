<div class="row">
    <div class="col-12">
        @if(count($errors) > 0)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
            <p class="mb-1">{{ $error }}</p>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}">
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Service Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Description') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control editor', 'placeholder'=>'Tell me
                    about your service in detail...']) !!}
                </div>
                <div class="form-group">

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">Image</div>
                <div class="text-center img-preview">
                    @if(isset($service->image))
                    <img id="preview" src="{{ asset('storage/images/'.$service->image) }}" class="img-fluid" /><br />
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
                {!! Form::checkbox('isHomePage', null) !!}
                {!! Form::label('Show in Home Page') !!}
            </div>
        </div>


        <div class="card mb-2">
            <div class="card-body">
                <div class="row m-0">
                    {!! Form::button($formMode === 'edit' ? 'Update' : 'Publish', ['type'=>'submit', 'class' => 'btn
                    btn-secondary btn-sm col-md-6']) !!}
                    <a href="{{route('service.index')}}" class="btn btn-primary col-md-6">Cancel</a>
                </div>
            </div>
        </div>

    </div>
</div>
