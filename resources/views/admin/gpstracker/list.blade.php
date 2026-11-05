@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3 py-4">
        <div class="col-sm-10">
          @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
          @endif
        </div>
        <div class="col-sm-2">
          <a href="{{ route('admin.gpstracker.add') }}" class="btn btn-primary btn-md"><i class="fas fa-plus"></i> Add New Record</a>
        </div>
      </div>

    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
          
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-map"></i> GPS Tracker List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Driver Name</th>
                    <th>Contact No</th>
                    <th>Plate Number</th>
                    <th>View</th>
                    <th>Travel Status</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Created by</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(!empty($getRecord))
                      @foreach($getRecord as $gps)
                      <tr>
                        <td>{{ $gps->driver_name }}</td>
                        <td>{{ $gps->contact_no }}</td>
                        <td>{{ $gps->plate_number }}</td>
                        <td><a href="{{ route('admin.gpstracker.map',Crypt::encryptString($gps->id)) }}" target="_blank">Map</a> </td>
                        <td>
                           @if($gps->travel_status === "Pending")
                              <span class="badge badge-warning">{{ $gps->travel_status }}</span>
                              @elseif($gps->travel_status === "In Transit")
                              <span class="badge badge-secondary">{{ $gps->travel_status }}</span>
                              @elseif($gps->travel_status === "Travel Ongoing")
                              <span class="badge badge-primary">{{ $gps->travel_status }}</span>
                              @elseif($gps->travel_status === "Stopped")
                              <span class="badge badge-danger">{{ $gps->travel_status }}</span>
                              @elseif($gps->travel_status === "Arrived")
                              <span class="badge badge-success">{{ $gps->travel_status }}</span>
                              @elseif($gps->travel_status === "Offline")
                              <span class="badge badge-dark">{{ $gps->travel_status }}</span>
                              @else
                              <span class="badge badge-danger">Unassign</span>
                            @endif
                        </td>
                        <td>
                          @if($gps->status === "Active")
                            <span class="badge badge-success">{{ $gps->status }}</span>
                            @elseif($gps->status === "Inactive")
                            <span class="badge badge-secondary">{{ $gps->status }}</span>
                            @elseif($gps->status === "Deactivate")
                            <span class="badge badge-danger">{{ $gps->status }}</span>
                            @else
                            <span class="badge badge-dark">Unassign</span>
                          @endif
                        </td>
                        <td>{{ date('d-m-Y', strtotime($gps->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($gps->updated_at)) }}</td>
                        <td>{{ $gps->created_by }}</td>
                        <td>
                            <a href="{{ route('admin.gpstracker.edit', Crypt::encryptString($gps->id)) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                          @can('delete-gps')
                            <form action="{{ route('admin.gpstracker.delete', $gps->id) }}"
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