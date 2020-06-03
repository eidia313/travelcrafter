<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'City']) !!}
</div>
<div class="form-group">
    {!! Form::label('Country') !!}
    {!! Form::select('country_id', $country, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('country_id')}}</i></span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Status') !!}
    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('status')}}</i></span>
    @endif
</div>
