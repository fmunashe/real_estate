@extends('layouts.login')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <!-- <img src="/img/logo2.png" class="img-responsive" style="margin: auto;"> -->
    <b>MS</b> Resource
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <input id="password" type="password" 
          class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" 
          placeholder="Password"
           name="password" required autocomplete="current-password">
         @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="{{ route('password.request') }}">I forgot my password</a>
      </p>

    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
