@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3 py-4">
        <div class="col-sm-10">
          @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif
        </div>
          @can('view-user')
          <div class="col-sm-2">
            <a href="{{ route('admin.users.add') }}" class="btn btn-primary btn-md"><i class="fas fa-plus"></i> Add New Record</a>
          </div>
          @endcan
      </div>

    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i> Users List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created by</th>
                    @can('view-user')
                    <th>Please don't click! <br/> (Administrator use only)</th>
                    @endcan
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(!empty($getRecordStatus))
                      @foreach($getRecordStatus as $user)
                      <tr>
                        <td>
                          @if(!empty($user->image))
                            <img style="width: 30px;height:30px;" src="{{ asset('uploads/users/myprofile/'.$user->image) }}" class="img-circle elevation-2" alt="User Image">
                            @else
                            <img style="width: 30px;height:30px;" src="{{ asset('asset/image/user-black.png') }}" class="img-circle elevation-2" alt="User Image">
                          @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->position }}</td>
                        <td>
                           @if($user->role === "Super Admin")
                              <span class="badge badge-success">{{ $user->role }}</span>
                              @elseif($user->role === "Admin")
                              <span class="badge badge-secondary">{{ $user->role }}</span>
                              @elseif($user->role === "User")
                              <span class="badge badge-primary">{{ $user->role }}</span>
                              @else
                              <span class="badge badge-dark">Unassign</span>
                            @endif
                        </td>
                        <td>
                          @if($user->status === "Active")
                            <span class="badge badge-success">{{ $user->status }}</span>
                            @elseif($user->status === "Inactive")
                            <span class="badge badge-secondary">{{ $user->status }}</span>
                            @elseif($user->status === "Deactivate")
                            <span class="badge badge-danger">{{ $user->status }}</span>
                            @else
                            <span class="badge badge-dark">Unassign</span>
                          @endif
                        </td>
                        <td>{{ $user->creator_name }}</td>
                        @can('view-user')
                          <td>
                              <form onsubmit="return confirm('Are you sure you want to force logout this user?')" action="{{ route('admin.users.forceLogout', $user->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to force logout this user?');">
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm">
                                      <i class="fas fa-sign-out-alt"></i> Force Logout
                                  </button>
                              </form>
                              
                          </td>
                        @endcan
                        <td>
                            <a href="{{ route('admin.users.edit',Crypt::encryptString($user->id)) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                            @can('delete-user',$user)
                              <form action="{{ route('admin.users.delete', $user->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        </div>
        </div>
    </div>
  </div>
  @include('admin.layouts.footer')