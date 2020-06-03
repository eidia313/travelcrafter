<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
  {{$equipment->where('category', 'log-wear')->pluck('name')}}
</div>
