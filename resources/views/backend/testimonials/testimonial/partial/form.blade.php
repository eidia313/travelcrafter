<div class="row mt-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="form-group" {{ $errors->has('client_name') ? 'is-invalid' : ''}}>
                    {!! Form::label('client_name', 'Client Name') !!}
                    {!! Form::text('client_name', null, ['class' => 'form-control']) !!}
                    @if($errors->has('client_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('client_name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('client_location', 'Client Location') !!}
                    {!! Form::text('client_location', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('video', 'Video') !!}
                    {!! Form::text('video', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('message', 'Client Message') !!}
                    {!! Form::textarea('client_message', null, ['id'=>'textEditor', 'class' => 'form-control']) !!}

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">


                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status,null,['class' => 'form-control']) !!}
                </div>


            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="md-form mt-0 mb-0">
                    <div class="form-actions">
                        {!! Form::button($formMode === 'edit' ? 'Update' : 'Create', ['type'=>'submit', 'class' => 'btn btn-info btn-sm btn-inline-block']) !!}
                        <a href="{{route('testimonial.index')}}" class="btn btn-link btn-secondary btn-sm btn-inline-block text-white">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
