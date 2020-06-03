@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        {{ Session::get('message') }}
    </div>
@endif

{!! Form::open(['route'=>'site.contact.store', 'method'=>'POST']) !!}

<div class="form-group">
    {!! Form::text('subject', null, $attributes = $errors->has('name') ? ['class' => 'form-control is-invalid', 'placeholder'=>'Full Name'] : ['class' => 'form-control', 'placeholder'=>'I would like chat about...']) !!}
    @if($errors->has('subject'))
        <div class="invalid-feedback">
            {{ $errors->first('subject') }}
        </div>
    @endif
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::text('name', null, $attributes = $errors->has('name') ? ['class' => 'form-control is-invalid', 'placeholder'=>'Full Name'] : ['class' => 'form-control', 'placeholder'=>'Full Name']) !!}

      @if($errors->has('name'))
          <div class="invalid-feedback">
              {{ $errors->first('name') }}
          </div>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::email('email', null, $attributes = $errors->has('email') ? ['class' => 'form-control is-invalid', 'placeholder'=>'Email Address'] : ['class' => 'form-control', 'placeholder'=>'Email Address']) !!}

      @if($errors->has('email'))
          <div class="invalid-feedback">
              {{ $errors->first('email') }}
          </div>
      @endif
    </div>
  </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-comment"></i>
        </div>
        {!! Form::textarea('contact_message', null, ['class' => 'form-control', 'placeholder'=>'Message', 'rows'=>'4']) !!}
    </div>
</div>

<div class="form-group d-flex justify-content-end">
  {!! Form::button('Send Message', ['type'=>'submit', 'class' => 'btn btn-white']) !!}
</div>
{!! Form::close() !!}
