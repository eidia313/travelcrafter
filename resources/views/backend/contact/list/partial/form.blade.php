<div class="form-group">
  <div class="{{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
    {!! Form::label('Contact Person') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Tshering Sherpa']) !!}
  </div>
</div>
<div class="form-group">
    {!! Form::label('Country') !!}
    {!! Form::select('c_id', $country, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('c_id')}}</i></span>
    @endif
</div>
<div class="form-group">
  <div class="{{ isset($errors)?($errors->first('email')?'has-error':''):'' }}" >
    {!! Form::label('Email Address') !!}
    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'theiremail@email.com']) !!}
  </div>
</div>
<div class="form-group">
  <div class="{{ isset($errors)?($errors->first('phone')?'has-error':''):'' }}" >
    {!! Form::label('City') !!}
    {!! Form::text('city', null, ['class'=>'form-control', 'placeholder'=>'Kathmandu']) !!}
  </div>
</div>
<div class="form-group">
  <div class="{{ isset($errors)?($errors->first('phone')?'has-error':''):'' }}" >
    {!! Form::label('Phone Number') !!}
    {!! Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'+977-9803676858']) !!}
  </div>
</div>