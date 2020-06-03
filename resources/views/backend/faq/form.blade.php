<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('question', 'Question') !!}
            {!! Form::text('question', null, ['class' => 'form-control']) !!}
            @if($errors->has('question'))
                <div class="invalid-feedback">
                    {{ $errors->first('question') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('answer', 'Answer') !!}
            {!! Form::textarea('answer', null, ['class' => 'form-control editor']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', $status, old('status') ?? isset($faq->status) ? $faq->status : '', ['class' => 'form-control']) !!}
        </div>
        {!! Form::button($formMode === 'edit' ? 'Update' : 'Create', ['type'=>'submit', 'class' => 'btn btn-secondary']) !!}
        <a href="{{route('faq.index')}}" class="btn btn-primary">Cancel</a>
    </div>
</div>
