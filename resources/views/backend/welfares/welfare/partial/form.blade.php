<div class="row">
    <div class="col-12">
        @include('partials.messages')
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="form-group {{ isset($errors)?($errors->first('title')?'has-error':''):'' }}">
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', null, ['class'=>'form-control', 'welfareholder'=>'Title']) !!}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ isset($errors)?($errors->first('altitude')?'has-error':''):'' }}">
                            {!! Form::label('Altitude') !!}
                            {!! Form::number('altitude', null, ['class'=>'form-control', 'welfareholder'=>'In meters
                            (m)',
                            'size'=> '5']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ isset($errors)?($errors->first('date')?'has-error':''):'' }}">
                            {!! Form::label('Date') !!}
                            {!! Form::text('date', null, ['class'=>'form-control', 'welfareholder'=>'dd/mm/yy']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ isset($errors)?($errors->first('sponsor')?'has-error':''):'' }}">
                            {!! Form::label('Sponsor') !!}
                            {!! Form::text('sponsor', null, ['class'=>'form-control', 'welfareholder'=>'Sponsor']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('desc', 'Description') !!}
                    {!! Form::textarea('desc', null, ['class' => 'form-control editor']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">Image</div>
                <div class="text-center img-preview">
                    @if(isset($welfare->image))
                    <img id="preview" src="{{ asset('storage/images/'.$welfare->image) }}" class="img-fluid" /><br />
                    @else
                    <img id="preview" src="{{ asset('backend/images/noimage.jpg') }}" width="100%" height="220" /><br />
                    @endif

                    <input type="file" name="image" id="image" class="d-none">

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
                    <a href="{{route('welfare.index')}}" class="btn btn-primary col-md-6">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
