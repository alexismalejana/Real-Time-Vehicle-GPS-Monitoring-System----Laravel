@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 py-1">
                    <h1>Add Record</h1>
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <form onsubmit="return confirm('Are you sure, you want to save the record?')" action="{{ route('admin.users.create') }}" method="post">
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
                        <span class="text text-danger">@error('position'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <select class="form-control" name="position" required>
                                <option value="">Select Position</option>
                                <option value="Staff">Staff</option>
                                <option value="Driver">Driver</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
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
                        <span class="text text-danger">@error('role'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <select class="form-control" name="role" required>
                                <option value="">Select Role</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('status'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <select class="form-control" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Deactivate">Deactivate</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-check"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save">
                            </i> Save Record</button>
                            <a href="{{ route('admin.users.list') }}" class="btn btn-dark"><i class="fas fa-arrow-left">
                            </i> Back</a>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  <script>
    
  </script>
  @include('admin.layouts.footer')