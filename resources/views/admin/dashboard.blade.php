@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-3">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }} {{ Auth::user()->name }}!</div>
              @elseif(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }} {{ Auth::user()->name }}!</div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $getTotalVehicle }}</h3>

                <p>Total Vehicles</p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $getTotalDriver }}</h3>

                <p>Active Drivers</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $getTotalVehicleOnTransit }}</h3>

                <p>On Trip</p>
              </div>
              <div class="icon">
                <i class="fas fa-road"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $getTotalVehicleParked }}</h3>

                <p>Parked</p>
              </div>
              <div class="icon">
                <i class="fas fa-parking"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $getTotalVehicleForMaintenance }}</h3>

                <p>For Maintenance</p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $getTotalVehicleStopped }}</h3>

                <p>Stopped</p>
              </div>
              <div class="icon">
                <i class="fas fa-stop"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $getTotalVehicleOffline }}</h3>

                <p>Offline</p>
              </div>
              <div class="icon">
                <i class="fas fa-ban"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $getTotalVehicleActiveGoogleMap }}</h3>

                <p>Active on Google Map</p>
              </div>
              <div class="icon">
                <i class="fas fa-location-arrow"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Role</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(!empty($getRecordStatus))
                      @foreach($getRecordStatus as $user)
                      <tr>
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
    </section>
  </div>

  @include('admin.layouts.footer')