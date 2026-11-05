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
        <div class="col-sm-2">
          <a href="{{ route('admin.vehicle.add') }}" class="btn btn-primary btn-md"><i class="fas fa-plus"></i> Add New Record</a>
        </div>
      </div>

    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
          
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-car"></i> Vehicle List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Vehicle Code</th>
                    <th>Plate Number</th>
                    <th>Vehicle Name</th>
                    <th>Manufactured Year</th>
                    <th>Remarks</th>
                    <th>Status</th>
                    <th>Assigned Driver</th>
                    <th>Created by</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(!empty($getRecord))
                      @foreach($getRecord as $vehicle)
                      <tr>
                        <td>{{ $vehicle->vehicle_code }}</td>
                        <td>{{ $vehicle->plate_number }}</td>
                        <td>{{ $vehicle->vehicle_name }}</td>
                        <td>{{ $vehicle->year }}</td>
                        
                        <td>
                           @if($vehicle->remarks === "Good Condition")
                              <span class="badge badge-success">{{ $vehicle->remarks }}</span>
                              @elseif($vehicle->remarks === "For Maintenance")
                              <span class="badge badge-secondary">{{ $vehicle->remarks }}</span>
                              @elseif($vehicle->remarks === "Available for Operation")
                              <span class="badge badge-primary">{{ $vehicle->remarks }}</span>
                              @elseif($vehicle->remarks === "Newly Registered")
                              <span class="badge badge-primary">{{ $vehicle->remarks }}</span>
                              @elseif($vehicle->remarks === "Assigned to Company Operations")
                              <span class="badge badge-primary">{{ $vehicle->remarks }}</span>
                              @elseif($vehicle->remarks === "Minor scratches on Body")
                              <span class="badge badge-primary">{{ $user->remarks }}</span>
                              @elseif($vehicle->remarks === "Under Repair")
                              <span class="badge badge-primary">{{ $vehicle->remarks }}</span>
                              @else
                              <span class="badge badge-dark">Unassign</span>
                            @endif
                        </td>
                        <td>
                          @if($vehicle->status === "Approved")
                            <span class="badge badge-success">{{ $vehicle->status }}</span>
                            @elseif($vehicle->status === "Declined")
                            <span class="badge badge-danger">{{ $vehicle->status }}</span>
                            @elseif($vehicle->status === "Pending")
                            <span class="badge badge-secondary">{{ $vehicle->status }}</span>
                            @elseif($vehicle->status === "Withdraw")
                            <span class="badge badge-primary">{{ $vehicle->status }}</span>
                            @else
                            <span class="badge badge-dark">Unassign</span>
                          @endif
                        </td>
                        <td>{{ $vehicle->assigned_driver }}</td>
                        <td>{{ $vehicle->created_by }}</td>
                        <td>
                            <a href="{{ route('admin.vehicle.edit', Crypt::encryptString($vehicle->id)) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            @can('delete-vehicle')
                              <form action="{{ route('admin.vehicle.delete', $vehicle->id) }}"
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
  <script>

  </script>
  @include('admin.layouts.footer')