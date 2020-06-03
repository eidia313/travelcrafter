<div class="row form-group">
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('logo')?'has-error':''):'' }}" >
      {!! Form::label('Logo') !!}
      {!! Form::file('logo', null ) !!}
    </div>
  </div>

  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('altlogo')?'has-error':''):'' }}" >
      {!! Form::label('Alt Logo') !!}
      {!! Form::file('altlogo', null) !!}
    </div>
  </div>
</div>

<div class="row form-group">
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('sitename')?'has-error':''):'' }}" >
      {!! Form::label('Site Name') !!}
      {!! Form::text('sitename', null, ['class'=>'form-control', 'placeholder'=>'Site Name']) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('email')?'has-error':''):'' }}" >
      {!! Form::label('email') !!}
      {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'someone@email.com']) !!}
    </div>
  </div>
  
</div>

<div class="row form-group">
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('landline')?'has-error':''):'' }}" >
      {!! Form::label('Landline Number') !!}
      {!! Form::number('landline', null, ['class'=>'form-control', 'placeholder'=>'01xxxxxxx']) !!}
    </div>
  </div>

  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('phonenumber')?'has-error':''):'' }}" >
      {!! Form::label('Mobile Number') !!}
      {!! Form::number('phonenumber', null, ['class'=>'form-control', 'placeholder'=>'98xxxxxxxx']) !!}
    </div>
  </div>
</div>

<div class="row form-group">
  
  <div class="col-md-6">
    <div class="{{ isset($errors)?($errors->first('address')?'has-error':''):'' }}" >
      {!! Form::label('Address') !!}
      {!! Form::textarea('address', null, ['class'=>'form-control address', 'placeholder'=>'Imadol, Lalipur, Nepal', 'rows' => 1, 'cols' => 40]) !!}
    </div>
  </div>
</div>

<fieldset class="social">
  <legend>Social Media</legend>
  <div class="row form-group">
    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('facebook')?'has-error':''):'' }}" >
        {!! Form::label('Facebook') !!}
        {!! Form::text('facebook', null, ['class'=>'form-control', 'placeholder'=>'facebook_name']) !!}
      </div>
    </div>

    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('twitter')?'has-error':''):'' }}" >
        {!! Form::label('Twitter') !!}
        {!! Form::text('twitter', null, ['class'=>'form-control', 'placeholder'=>'twitter_handle']) !!}
      </div>
    </div>
  </div>

  <div class="row form-group">
    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('instagram')?'has-error':''):'' }}" >
        {!! Form::label('Instagram') !!}
        {!! Form::text('instagram', null, ['class'=>'form-control', 'placeholder'=>'instagram_handle']) !!}
      </div>
    </div>

    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('youtube')?'has-error':''):'' }}" >
        {!! Form::label('Youtube') !!}
        {!! Form::text('youtube', null, ['class'=>'form-control', 'placeholder'=>'youtube_channel']) !!}
      </div>
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('whatsapp')?'has-error':''):'' }}" >
        {!! Form::label('Whatsapp') !!}
        {!! Form::text('whatsapp', null, ['class'=>'form-control', 'placeholder'=>'whatsapp number']) !!}
      </div>
    </div>
  </div>
</fieldset>
<fieldset class="video">
  <legend>Video</legend>
  <div class="row form-group">
    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('youtube')?'has-error':''):'' }}" >
        {!! Form::label('Promo Video') !!}
        {!! Form::text('promovideo', null, ['class'=>'form-control', 'placeholder'=>'Promo video Link']) !!}
      </div>
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-4">
      <div class="{{ isset($errors)?($errors->first('youtube')?'has-error':''):'' }}" >
        {!! Form::label('Video(mp4)') !!}
        {!! Form::file('videomp', null) !!}
      </div>
    </div>

    <div class="col-md-4">
      <div class="{{ isset($errors)?($errors->first('youtube')?'has-error':''):'' }}" >
        {!! Form::label('Video(ogg)') !!}
        {!! Form::file('videoogg', null) !!}
      </div>
    </div>

    <div class="col-md-4">
      <div class="{{ isset($errors)?($errors->first('youtube')?'has-error':''):'' }}" >
        {!! Form::label('Video(webm)') !!}
        {!! Form::file('videowebm', null) !!}
      </div>
    </div>
  </div>
</fieldset>

<fieldset class="meta">
  <legend>Meta Datas</legend>
  <div class="row form-group">
    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('tripsorganized')?'has-error':''):'' }}" >
        {!! Form::label('Number of Trips Organized') !!}
        {!! Form::text('tripsorganized', null, ['class'=>'form-control', 'placeholder'=>'156']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="{{ isset($errors)?($errors->first('numofclients')?'has-error':''):'' }}" >
        {!! Form::label('Number of Clients') !!}
        {!! Form::text('numofclients', null, ['class'=>'form-control', 'placeholder'=>'156']) !!}
      </div>
    </div>
  </div>
</fieldset>
