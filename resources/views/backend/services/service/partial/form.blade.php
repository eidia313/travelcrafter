<div class="form-group {{ isset($errors)?($errors->first('name')?'has-error':''):'' }}" >
  {!! Form::label('Title') !!}
  {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Service Name']) !!}
</div>
<div class="form-group" >
  {!! Form::label('Description') !!}
  {!! Form::textarea('description', null, ['class'=>'form-control editor', 'placeholder'=>'Tell me about your service in detail...']) !!}
</div>
<div class="form-group">
  {!! Form::label('Image') !!}
  {!! Form::file('image', null) !!}
</div>
<div class="form-group">
{!! Form::checkbox('isHomePage', null) !!}
    {!! Form::label('Show in Home Page') !!}
</div>
