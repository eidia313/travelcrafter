<div class="row mt-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                @if(isset($page->slug))

                    <div class="form-group">
                        <span id="link">
                            <label for=""><strong>Url:</strong></label>
                            <a href="{{url('/').'/pages/'}}{{ isset($page->slug) ? $page->slug : '' }}" class="text-dark" target="_blank">
                                <span id="base-url">{{url('/')}}/pages/{{ isset($page->slug) ? $page->slug : ''}}</span>
                            </a>
                        </span>
                    </div>
                @endif


                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control editor']) !!}

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">Featured Image</div>
                <div class="text-center img-preview">
                    @if(isset($page->image))
                        <img id="preview" src="{{ asset('storage/images/'.$page->image) }}" class="img-fluid"/><br/>
                    @else
                        <img id="preview" src="{{ asset('backend/images/noimage.jpg') }}" width="100%"  height="220"/><br/>
                @endif
                {{ Form::file('image', ['id'=>'image','class'=>'d-none']) }}

                <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
                    <a href="javascript:changeImage()">Change</a> |
                    <a style="color: red" href="javascript:removeImage()">Remove</a>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status, old('status') ?? isset($page->status) ? $page->status : '', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="md-form mt-0 mb-0">
                    {!! Form::button($formMode === 'edit' ? 'Update' : 'Create', ['type'=>'submit', 'class' => 'btn btn-info btn-sm btn-block']) !!}
                </div>
            </div>
        </div>
    </div>
</div>