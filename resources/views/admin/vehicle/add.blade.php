@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 py-1">
                    <h1>Add Record</h1>
                    @if(Session::has('error'))
                        <div class="alert alert-success">{{ Session::get('error') }}</div>
                    @endif
                    <form onsubmit="return confirm('Are you sure, you want to save the record?')" action="{{ route('admin.vehicle.create') }}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="row">
                            <div class="col-md-3">
                                <span class="text text-danger">@error('vehicle_code'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="vehicle_code" placeholder="Vehicle Code">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-code"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="text text-danger">@error('plate_number'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="plate_number" placeholder="Plate Number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="text text-danger">@error('vehicle_name'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="vehicle_name" placeholder="Vehicle Name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-car"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="text text-danger">@error('vehicle_type'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="vehicle_type">
                                        <option value="">Select Vehicle Type</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Pickup Truck">Pickup Truck</option>
                                        <option value="Van">Van</option>
                                        <option value="Bus">Bus</option>
                                        <option value="Motorcycle">Motorcycle</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-car"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <span class="text text-danger">@error('make'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <select type="text" class="form-control" name="make">
                                        <option value="">Select Vehicle Make</option>
                                        <option value="Toyota">Toyota</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Mitsubishi">Mitsubishi</option>
                                        <option value="Nissan">Nissan</option>
                                        <option value="Ford">Ford</option>
                                        <option value="Isuzu">Isuzu</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-car"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="text text-danger">@error('model'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="model">
                                        <option value="">Select Model</option>
                                        <option value="Vios">Vios</option>
                                        <option value="Corolla">Corolla</option>
                                        <option value="Fortuner">Fortuner</option>
                                        <option value="Hilux">Hilux</option>
                                        <option value="Innova">Innova</option>
                                        <option value="Civic">Civic</option>
                                        <option value="City">City</option>
                                        <option value="CR-V">CR-V</option>
                                        <option value="BR-V">BR-V</option>
                                        <option value="Mirage">Mirage</option>
                                        <option value="Montero Sport">Montero Sport</option>
                                        <option value="Xpander">Xpander</option>
                                        <option value="L300">L300</option>
                                        <option value="D-Max">D-Max</option>
                                        <option value="mu-X">mu-X</option>
                                        <option value="Traviz">Traviz</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-car"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="text text-danger">@error('year'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="year" placeholder="Manufacture Year">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="text text-danger">@error('color'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="color" class="form-control" name="color" placeholder="Color">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-palette"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <span class="text text-danger">@error('fuel_type'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="fuel_type">
                                        <option value="">Select Fuel Type</option>
                                        <option value="Gasoline">Gasoline</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="LPG">LPG</option>
                                        <option value="CNG">CNG</option>
                                        <option value="Electric">Electric</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="Plug-in Hybrid">Plug-in Hybrid</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-gas-pump"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('chassis_number'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="chassis_number" placeholder="Chassis Number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-cog"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text text-danger">@error('engine_number'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="engine_number" placeholder="Engine Number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-car"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <span class="text text-danger">@error('gps_device_id'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="gps_device_id" placeholder="GPS Device Number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-laptop"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text text-danger">@error('assigned_driver'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="assigned_driver">
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
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <span class="text text-danger">@error('remarks'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <select type="text" class="form-control" name="remarks">
                                        <option value="">Select Remark</option>
                                        <option value="Good Condition">Good Condition</option>
                                        <option value="For Maintenance">For Maintenance</option>
                                        <option value="Available for Operation">Available for Operation</option>
                                        <option value="Requires engine inspectione">Requires engine inspection</option>
                                        <option value="Newly registered">Newly Registered</option>
                                        <option value="Assigned to Company Operations">Assigned to Company Operations</option>
                                        <option value="Minor scratches on body">Minor scratches on body</option>
                                        <option value="Under Repair">Under Repair</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-globe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text text-danger">@error('status'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <select type="time" class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Declined">Declined</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Withdraw">Withdraw</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-clock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save">
                                </i> Save Record</button>
                                <a href="{{ route('admin.vehicle.list') }}" class="btn btn-dark"><i class="fas fa-arrow-left">
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