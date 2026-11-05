@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 py-1">
                    <h1><i class="fas fa-key"></i> Change Password</h1>

                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @elseif(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ route('admin.changepassword.change_password') }}" method="post">
                        {{ csrf_field() }}
                        <span class="text text-danger">@error('old_password'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                        <input type="password" class="form-control" name="old_password" placeholder="Current Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <span class="text text-danger">@error('new_password'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fas fa-key"></i> Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
  @include('admin.layouts.footer')