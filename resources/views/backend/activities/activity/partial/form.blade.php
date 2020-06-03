<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Activity']) !!}
</div>
<div class="form-group">
    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control editor']) !!}

</div>
<div class="form-group">
  {!! Form::label('Cover Image') !!}
  {!! Form::file('image', null) !!}
</div>
<div class="form-group">
  {!! Form::label('Thumbnail') !!}
  {!! Form::file('thumb', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Include in Tailor Made?') !!}
    {!! Form::checkbox('showontailor', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Status') !!}
    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('status')}}</i></span>
    @endif
</div>
