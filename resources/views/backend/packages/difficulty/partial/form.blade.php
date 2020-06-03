<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Difficulty Title']) !!}
</div>
<div class="form-group" >
  {!! Form::label('Description') !!}
  {!! Form::textarea('desc', null, ['class'=>'form-control editor', 'placeholder'=>'Difficulty Description...']) !!}
</div>
<div class="form-group">
  {!! Form::label('Image') !!}
  {!! Form::file('image', null) !!}
</div>
