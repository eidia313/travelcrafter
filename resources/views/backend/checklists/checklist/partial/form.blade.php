<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
</div>
<div class="form-group">
    {!! Form::label('Category') !!}
    {!! Form::select('category', $category, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('status')}}</i></span>
    @endif
</div>
