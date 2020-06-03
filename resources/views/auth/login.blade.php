@extends('backend.layouts.loginapp')

@section('content')

<div class="d-flex align-items-center login">
<div class="login__box w-50">
  <div class="login__box--form mx-auto">
      <h4>Log In to Admin Panel</h4>
      @if(Session::get('message'))
      <p class="alert alert-danger">{!! Session::get('message') !!}</p>
      @endif
      @if ($errors->has('email'))
          <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="input-wrap">
            <input id="email" type="email" class="login-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
            <label for="email">{{ __('E-mail Address...') }}</label>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-wrap">
            <input id="password" type="password" class="login-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="off">
            <label for="password">{{ __('Password...') }}</label>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>

          <button type="submit" class="btn btn-primary btn-wide">
              {{ __('Login') }}
          </button>
      </form>
  </div>
</div>
<div class="login__image h-100 d-flex flex-row w-50">
    <div class="form-wrap align-self-center">
        <h3>Travel Crafter, a travel site CMS!</h3>
        <p>A product of <span>Mind Seed Studios</span></p>
    </div>
</div>
</div>
@endsection
