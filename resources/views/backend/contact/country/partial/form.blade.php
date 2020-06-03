<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}">
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nepal...']) !!}
</div>
