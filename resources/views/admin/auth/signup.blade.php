@php
  $getSetting = App\Models\Setting::getSetting();
@endphp

@include('admin.templates.header')

<div class="login-box">

  <div class="card card-outline card-primary" style="background: transparent">
    <div class="card-header text-center text-dark">
      <h1 style="font-size: 30px;" class="text-white">{{ $getSetting->app_name }}</h1>
      <p class="text-white">Version {{ $getSetting->version }}</p>
      <a href="{{ route('admin.auth.login') }}" class="h1 text-white"><b class="text-white">Admin</b> Signup</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg text-white">Signup here to create your account.</p>
      @if(Session::has('error'))
          <div class="alert alert-danger">{{ Session::get('error') }}</div>
      @endif
      <form action="{{ route('admin.auth.create') }}" method="post">
      	{{ csrf_field() }}
        <span class="text text-danger">@error('name'){{ $message }}@enderror</span>
      	<div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
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
        Already have an account? Click <a href="{{ route('admin.auth.login') }}" class="text-center">here</a> to login
      </p>
    </div>

  </div>

</div>

@include('admin.templates.footer')