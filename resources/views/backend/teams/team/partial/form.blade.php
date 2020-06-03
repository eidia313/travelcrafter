<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Tshering Mingma Sherpa']) !!}
</div>
<div class="form-group">
  {!! Form::label('Image') !!}
  {!! Form::file('image', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Designation') !!}
    {!! Form::text('designation', null, ['class'=>'form-control', 'placeholder'=>'Managing Director']) !!}
</div>
