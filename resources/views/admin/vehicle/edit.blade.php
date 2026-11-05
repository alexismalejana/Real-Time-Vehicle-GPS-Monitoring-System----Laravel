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
                    <form onsubmit="return confirm('Are you sure, you want to save the record?')" action="{{ route('admin.vehicle.update',Crypt::encryptString($getSingleRecord->id)) }}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="row">
                            <div class="col-md-3">
                                <span class="text text-danger">@error('vehicle_code'){{ $message }}@enderror</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="vehicle_code" value="{{ $getSingleRecord->vehicle_code }}" placeholder="Vehicle Code">
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
                                    <input type="text" class="form-control" name="plate_number" value="{{ $getSingleRecord->plate_number }}" placeholder="Plate Number">
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
                                    <input type="text" class="form-control" name="vehicle_name" value="{{ $getSingleRecord->vehicle_name }}" placeholder="Vehicle Name">
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
                                        <option {{ ($getSingleRecord->vehicle_type == 'Sedan')? 'selected' : '' }} value="Sedan">Sedan</option>
                                        <option {{ ($getSingleRecord->vehicle_type == 'SUV')? 'selected' : '' }} value="SUV">SUV</option>
                                        <option {{ ($getSingleRecord->vehicle_type == 'Pickup Truck')? 'selected' : '' }} value="Pickup Truck">Pickup Truck</option>
                                        <option {{ ($getSingleRecord->vehicle_type == 'Van')? 'selected' : '' }} value="Van">Van</option>
                                        <option {{ ($getSingleRecord->vehicle_type == 'Bus')? 'selected' : '' }} value="Bus">Bus</option>
                                        <option {{ ($getSingleRecord->vehicle_type == 'Motorcycle')? 'selected' : '' }} value="Motorcycle">Motorcycle</option>
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
                                        <option {{ ($getSingleRecord->make == 'Toyota')? 'selected' : '' }} value="Toyota">Toyota</option>
                                        <option {{ ($getSingleRecord->make == 'Honda')? 'selected' : '' }} value="Honda">Honda</option>
                                        <option {{ ($getSingleRecord->make == 'Mitsubishi')? 'selected' : '' }} value="Mitsubishi">Mitsubishi</option>
                                        <option {{ ($getSingleRecord->make == 'Nissan')? 'selected' : '' }} value="Nissan">Nissan</option>
                                        <option {{ ($getSingleRecord->make == 'Ford')? 'selected' : '' }} value="Ford">Ford</option>
                                        <option {{ ($getSingleRecord->make == 'Isuzu')? 'selected' : '' }} value="Isuzu">Isuzu</option>
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
                                        <option {{ ($getSingleRecord->model == 'Vios')? 'selected': '' }} value="Vios">Vios</option>
                                        <option {{ ($getSingleRecord->model == 'Corolla')? 'selected': '' }} value="Corolla">Corolla</option>
                                        <option {{ ($getSingleRecord->model == 'Fortuner')? 'selected': '' }} value="Fortuner">Fortuner</option>
                                        <option {{ ($getSingleRecord->model == 'Hilux')? 'selected': '' }} value="Hilux">Hilux</option>
                                        <option {{ ($getSingleRecord->model == 'Innova')? 'selected': '' }} value="Innova">Innova</option>
                                        <option {{ ($getSingleRecord->model == 'Civic')? 'selected': '' }} value="Civic">Civic</option>
                                        <option {{ ($getSingleRecord->model == 'City')? 'selected': '' }} value="City">City</option>
                                        <option {{ ($getSingleRecord->model == 'CR-V')? 'selected': '' }} value="CR-V">CR-V</option>
                                        <option {{ ($getSingleRecord->model == 'BR-V')? 'selected': '' }} value="BR-V">BR-V</option>
                                        <option {{ ($getSingleRecord->model == 'Mirage')? 'selected': '' }} value="Mirage">Mirage</option>
                                        <option {{ ($getSingleRecord->model == 'Montero Sport')? 'selected': '' }} value="Montero Sport">Montero Sport</option>
                                        <option {{ ($getSingleRecord->model == 'Xpander')? 'selected': '' }} value="Xpander">Xpander</option>
                                        <option {{ ($getSingleRecord->model == 'L300')? 'selected': '' }} value="L300">L300</option>
                                        <option {{ ($getSingleRecord->model == 'D-Max')? 'selected': '' }} value="D-Max">D-Max</option>
                                        <option {{ ($getSingleRecord->model == 'mu-X')? 'selected': '' }} value="mu-X">mu-X</option>
                                        <option {{ ($getSingleRecord->model == 'Traviz')? 'selected': '' }} value="Traviz">Traviz</option>
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
                                    <input type="text" class="form-control" name="year" value="{{ $getSingleRecord->year }}" placeholder="Manufacture Year">
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
                                    <input type="color" class="form-control" name="color" value="{{ $getSingleRecord->color }}" placeholder="Color">
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
                                        <option {{ ($getSingleRecord->fuel_type == 'Gasoline')? 'selected' : '' }} value="Gasoline">Gasoline</option>
                                        <option {{ ($getSingleRecord->fuel_type == 'Diesel')? 'selected' : '' }} value="Diesel">Diesel</option>
                                        <option {{ ($getSingleRecord->fuel_type == 'LPG')? 'selected' : '' }} value="LPG">LPG</option>
                                        <option {{ ($getSingleRecord->fuel_type == 'CNG')? 'selected' : '' }} value="CNG">CNG</option>
                                        <option {{ ($getSingleRecord->fuel_type == 'Electric')? 'selected' : '' }} value="Electric">Electric</option>
                                        <option {{ ($getSingleRecord->fuel_type == 'Hybrid')? 'selected' : '' }} value="Hybrid">Hybrid</option>
                                        <option {{ ($getSingleRecord->fuel_type == 'Plug-in Hybrid')? 'selected' : '' }} value="Plug-in Hybrid">Plug-in Hybrid</option>
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
                                    <input type="text" class="form-control" name="chassis_number" value="{{ $getSingleRecord->chassis_number }}" placeholder="Chassis Number">
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
                                    <input type="text" class="form-control" name="engine_number" value="{{ $getSingleRecord->engine_number }}" placeholder="Engine Number">
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
                                    <input type="text" class="form-control" name="gps_device_id" value="{{ $getSingleRecord->gps_device_id }}" placeholder="GPS Device Number">
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
                                        <option {{ ($getSingleRecord->remarks == 'Good Condition')? 'selected': '' }} value="Good Condition">Good Condition</option>
                                        <option {{ ($getSingleRecord->remarks == 'For Maintenance')? 'selected': '' }} value="For Maintenance">For Maintenance</option>
                                        <option {{ ($getSingleRecord->remarks == 'Available for Operation')? 'selected': '' }} value="Available for Operation">Available for Operation</option>
                                        <option {{ ($getSingleRecord->remarks == 'Requires engine inspectione')? 'selected': '' }} value="Requires engine inspectione">Requires engine inspection</option>
                                        <option {{ ($getSingleRecord->remarks == 'Newly registered')? 'selected': '' }} value="Newly registered">Newly Registered</option>
                                        <option {{ ($getSingleRecord->remarks == 'Assigned to Company Operations')? 'selected': '' }} value="Assigned to Company Operations">Assigned to Company Operations</option>
                                        <option {{ ($getSingleRecord->remarks == 'Minor scratches on body')? 'selected': '' }} value="Minor scratches on body">Minor scratches on body</option>
                                        <option {{ ($getSingleRecord->remarks == 'Under Repair')? 'selected': '' }} value="Under Repair">Under Repair</option>
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
                                        <option {{ ($getSingleRecord->status == 'Approved')? 'selected': '' }} value="Approved">Approved</option>
                                        <option {{ ($getSingleRecord->status == 'Declined')? 'selected': '' }} value="Declined">Declined</option>
                                        <option {{ ($getSingleRecord->status == 'Pending')? 'selected': '' }} value="Pending">Pending</option>
                                        <option {{ ($getSingleRecord->status == 'Withdraw')? 'selected': '' }} value="Withdraw">Withdraw</option>
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