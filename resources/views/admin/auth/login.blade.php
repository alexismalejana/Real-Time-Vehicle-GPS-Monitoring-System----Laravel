@php
  $getSetting = App\Models\Setting::getSetting();
@endphp

@include('admin.templates.header')

<div class="login-box">

  <div class="card card-outline card-primary" style="background: transparent">
    <div class="card-header text-center">
      <h1 style="font-size: 30px;" class="text-white">{{ $getSetting->app_name }}</h1>
        <p class="text-white">Version {{ $getSetting->version }}</p>
      <a href="{{ route('admin.auth.login') }}" class="h1 text-white""><b class="text-white">Admin</b> Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg text-white">Login in to start your session</p>
      @if(Session::has('error'))
          <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @elseif(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
      <form action="{{ route('admin.auth.insert') }}" method="post">
      	{{ csrf_field() }}
        <span class="text text-danger">@error('email'){{ $message }}@enderror</span>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text text-danger">@error('password'){{ $message }}@enderror</span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        </div>
      </form>

      <p class=" mt-2 mb-1 text-white">
       Forgot your password? Click <a href="forgot-password.html">here</a> to reset.
      </p>
      <p class="mb-0 text-white">
        Not yet a member? Click <a href="{{ route('admin.auth.signup') }}" class="text-center">here</a> to create an account.
      </p>
    </div>

  </div>

</div>

@include('admin.templates.footer')
