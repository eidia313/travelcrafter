<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Country Name']) !!}
</div>
<div class="form-group {{ isset($errors)?($errors->first('latitude')?'has-error':''):'' }}" >
    {!! Form::label('Latitude') !!}
    {!! Form::text('latitude', null, ['class'=>'form-control', 'placeholder'=>'Latitude']) !!}
</div>
<div class="form-group {{ isset($errors)?($errors->first('longitude')?'has-error':''):'' }}" >
    {!! Form::label('Longitude') !!}
    {!! Form::text('longitude', null, ['class'=>'form-control', 'placeholder'=>'Longitude']) !!}
</div>
<div class="form-group">
  {!! Form::label('Cover Image') !!}
  {!! Form::file('cover_image', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Status') !!}
    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('status')}}</i></span>
    @endif
</div>
