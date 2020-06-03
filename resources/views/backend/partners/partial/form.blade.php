<div class="row form-group">
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
      {!! Form::label('Contact Person') !!}
      {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Tshering Sherpa']) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('company')?'has-error':''):'' }}" >
      {!! Form::label('Company') !!}
      {!! Form::text('company', null, ['class'=>'form-control', 'placeholder'=>'High Country Trekking']) !!}
    </div>
  </div>
</div>
<div class="row form-group">
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('email')?'has-error':''):'' }}" >
      {!! Form::label('Email') !!}
      {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'info@highcountrytrekking.com']) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('number')?'has-error':''):'' }}" >
      {!! Form::label('Number') !!}
      {!! Form::number('number', null, ['class'=>'form-control', 'placeholder'=>'+977-01-44xxxxx']) !!}
    </div>
  </div>
</div>
<div class="row form-group">
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('city')?'has-error':''):'' }}" >
      {!! Form::label('City') !!}
      {!! Form::text('city', null, ['class'=>'form-control', 'placeholder'=>'Kathmandu']) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('country')?'has-error':''):'' }}" >
      {!! Form::label('Country') !!}
      {!! Form::text('country', null, ['class'=>'form-control', 'placeholder'=>'Nepal']) !!}
    </div>
  </div>
</div>
<div class="row form-group">
  <div class="col-md-12">
    <div class="{{ isset($errors)?($errors->first('address')?'has-error':''):'' }}" >
      {!! Form::label('Address') !!}
      {!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Budanilkantha, Kathmandu, Nepal']) !!}
    </div>
  </div>
</div>
