<div class="row">
    <div class="col-12">
        @include('partials.messages')
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Conservation Area']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Status') !!}
                    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
                </div>

                <div class="form-actions">
                    {!! Form::button($formMode === 'edit' ? 'Update' : 'Publish', ['type'=>'submit', 'class' => 'btn
                    btn-secondary btn-sm']) !!}
                    <a href="{{route('placetype.index', $activity)}}" class="btn btn-primary" type="button">Cancel</a>
                </div>

            </div>
        </div>
    </div>
</div>
