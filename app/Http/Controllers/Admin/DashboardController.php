<?php

namespace App\Http\Controllers\Admin;

use App\Models\GPS;
use App\Models\Vehicle;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['getTotalVehicleActiveGoogleMap'] = GPS::getTotalVehicleActiveGoogleMap();
        $data['getTotalVehicleOffline'] = GPS::getTotalVehicleOffline();
        $data['getTotalVehicleStopped'] = GPS::getTotalVehicleStopped();
        $data['getTotalVehicleForMaintenance'] = Vehicle::getTotalVehicleForMaintenance();
        $data['getTotalVehicleParked'] = GPS::getTotalVehicleParked();
        $data['getTotalVehicleOnTransit'] = GPS::getTotalVehicleOnTransit();
        $data['getTotalDriver'] = User::getTotalDriver();
        $data['getTotalVehicle'] = Vehicle::getTotalVehicle();
        $data['getRecordStatus'] = User::getRecordStatus();
        return view('admin.dashboard',$data);
    }
}
