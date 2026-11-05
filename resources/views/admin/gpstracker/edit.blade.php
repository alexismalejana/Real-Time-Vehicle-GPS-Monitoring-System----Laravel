@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 py-1">
                    <h1>Edit Record</h1>
                    @if(Session::has('error'))
                        <div class="alert alert-success">{{ Session::get('error') }}</div>
                    @endif
                    <form onsubmit="return confirm('Are you sure, you want to save the record?')" action="{{ route('admin.gpstracker.update',Crypt::encryptString($getSingleRecord->id)) }}" method="post">
                        {{ csrf_field() }}
                        <span class="text text-danger">@error('driver_name'){{ $message }}@enderror</span>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <select class="form-control" name="driver_name">
                                        <option value="">Select Driver Name</option>
                                        @foreach($getDriverName as $driver)
                                            <option value="{{ $driver->name }}">{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('contact_no'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="contact_no" value="{{ $getSingleRecord->contact_no }}" placeholder="Contact No">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('license_no'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="license_no" value="{{ $getSingleRecord->license_no }}" placeholder="License No">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <span class="text text-danger">@error('gps_device_id'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="gps_device_id" value="{{ $getSingleRecord->gps_device_id }}" placeholder="GPS Device ID">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('driver_id'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="driver_id" value="{{ $getSingleRecord->driver_id }}" placeholder="Driver ID">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('plate_number'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="plate_number" value="{{ $getSingleRecord->plate_number }}" placeholder="Plate Number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <span class="text text-danger">@error('from_loc'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="from_loc" value="{{ $getSingleRecord->from_loc }}" placeholder="From Location">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-map"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text text-danger">@error('to_loc'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="to_loc" value="{{ $getSingleRecord->to_loc }}" placeholder="To Location">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-map"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <span class="text text-danger">@error('time_departure'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="time" class="form-control" name="time_departure" value="{{ $getSingleRecord->time_departure }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-clock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text text-danger">@error('time_arrival'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="time" class="form-control" name="time_arrival" value="{{ $getSingleRecord->time_arrival }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-clock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <span class="text text-danger">@error('latitude'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="latitude" value="{{ $getSingleRecord->latitude }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-globe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('longitude'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="longitude" value="{{ $getSingleRecord->longitude }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-globe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('accuracy'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="accuracy" value="{{ $getSingleRecord->accuracy }}" placeholder="Accuracy">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-tachometer-alt"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <span class="text text-danger">@error('google_map'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="google_map" value="{{ $getSingleRecord->google_map }}" placeholder="Google Map">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-link"></span>
                                </div>
                            </div>
                        </div>

                        <span class="text text-danger">@error('travel_status'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <select class="form-control" name="travel_status" required>
                                <option value="">Select Travel Status</option>
                                <option {{ ($getSingleRecord->travel_status == 'Pending') ? 'selected': '' }} value="Pending">Pending</option>
                                <option {{ ($getSingleRecord->travel_status == 'In Transit') ? 'selected': '' }} value="In Transit">In Transit</option>
                                <option {{ ($getSingleRecord->travel_status == 'Travel Ongoing') ? 'selected': '' }} value="Travel Ongoing">Travel Ongoing</option>
                                <option {{ ($getSingleRecord->travel_status == 'Parked') ? 'selected': '' }} value="Parked">Parked</option>
                                <option {{ ($getSingleRecord->travel_status == 'Stopped') ? 'selected': '' }} value="Stopped">Stopped</option>
                                <option {{ ($getSingleRecord->travel_status == 'Arrived') ? 'selected': '' }} value="Arrived">Arrived</option>
                                <option {{ ($getSingleRecord->travel_status == 'Offline') ? 'selected': '' }} value="Offline">Offline</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-check"></span>
                                </div>
                            </div>
                        </div>

                        <span class="text text-danger">@error('status'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <select class="form-control" name="status" required>
                                <option value="">Select Status</option>
                                <option {{ ($getSingleRecord->status == 'Active') ? 'selected': '' }} value="Active">Active</option>
                                <option {{ ($getSingleRecord->status == 'Inactive') ? 'selected': '' }} value="Inactive">Inactive</option>
                                <option {{ ($getSingleRecord->status == 'Deactivate') ? 'selected': '' }} value="Deactivate">Deactivate</option>
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
                            <a href="{{ route('admin.gpstracker.list') }}" class="btn btn-dark"><i class="fas fa-arrow-left">
                            </i> Back</a>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
  @include('admin.layouts.footer')