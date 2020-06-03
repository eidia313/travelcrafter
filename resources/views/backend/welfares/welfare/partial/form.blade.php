<div class="form-group {{ isset($errors)?($errors->first('title')?'has-error':''):'' }}" >
  {!! Form::label('Title') !!}
  {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) !!}
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group {{ isset($errors)?($errors->first('altitude')?'has-error':''):'' }}" >
      {!! Form::label('Altitude') !!}
      {!! Form::number('altitude', null, ['class'=>'form-control', 'placeholder'=>'In meters (m)', 'size'=> '5']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ isset($errors)?($errors->first('date')?'has-error':''):'' }}" >
      {!! Form::label('Date') !!}
      {!! Form::text('date', null, ['class'=>'form-control', 'placeholder'=>'dd/mm/yy']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ isset($errors)?($errors->first('sponsor')?'has-error':''):'' }}" >
      {!! Form::label('Sponsor') !!}
      {!! Form::text('sponsor', null, ['class'=>'form-control', 'placeholder'=>'Sponsor']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  {!! Form::label('Cover Image') !!}
  {!! Form::file('image', null) !!}
</div>
<div class="form-group">
    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control editor']) !!}
</div>
