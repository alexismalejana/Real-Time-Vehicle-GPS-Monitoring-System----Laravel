@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                @if(!empty(Auth::user()->image))
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('uploads/users/myprofile/'.Auth::user()->image) }}"
                       alt="User profile picture">
                @else
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('asset/image/user-black.png') }}"
                       alt="User profile picture">
                @endif
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center">
                    {{ Auth::user()->position }} <br/>
                    {{ Auth::user()->role }}
                </p>

                <a href="#" class="btn btn-primary btn-block"><b>Contact on <i class="fab fa-whatsapp" style="color: white;"></i> </b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user"></i> Name</strong>

                <p class="text-muted">
                  {{ Auth::user()->name }}
                </p>

                <hr>

                <strong><i class="fas fa-envelope"></i> Email Address</strong>

                <p class="text-muted">{{ Auth::user()->email }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  {{ Auth::user()->skills }}
                </p>

                <hr>

                <strong><i class="fas fa-briefcase "></i> Experience</strong>

                <p class="text-muted">{{ Auth::user()->experience }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item card-title"><a class="nav-link bg-primary" href="#settings" data-toggle="tab">My Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                  <div class="tab-pane" id="settings">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ route('admin.myprofile.myprofile_update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Profile Picture</label>
                            <div class="col-sm-10">
                            <span class="text text-danger">@error('image'){{ $message }}@enderror</span>
                            <input type="file" class="form-control" name="image" id="inputName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <span class="text text-danger">@error('name'){{ $message }}@enderror</span>
                                <input type="text" class="form-control" name="name" value="{{ $myprofile->name }}" id="inputName" placeholder="Name">
                            </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <span class="text text-danger">@error('email'){{ $message }}@enderror</span>
                          <input type="email" class="form-control" name="email" value="{{ $myprofile->email }}" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                         <span class="text text-danger">@error('experience'){{ $message }}@enderror</span>
                          <textarea rows="8" class="form-control" name="experience" id="inputExperience" placeholder="Experience">{{ $myprofile->experience }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                            <span class="text text-danger">@error('skills'){{ $message }}@enderror</span>
                            <input type="text" class="form-control" value="{{ $myprofile->skills }}" name="skills" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                                <span class="text text-danger">@error('checked'){{ $message }}@enderror</span>
                              <input {{ ($myprofile->checked == 'on')? 'checked': '' }} type="checkbox" name="checked"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

@include('admin.layouts.footer')