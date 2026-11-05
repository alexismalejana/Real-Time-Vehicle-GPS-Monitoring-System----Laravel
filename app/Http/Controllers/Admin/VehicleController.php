<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Hashids;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function list(){
        $data['getRecord'] = Vehicle::getRecord();
        return view('admin.vehicle.list',$data);
    }

    public function add(){
        $data['getDriverName'] = User::getDriverName();
        return view('admin.vehicle.add',$data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'vehicle_code' => 'required|string|max:255|unique:vehicles,vehicle_code',
            'plate_number' => 'required|string|max:255|unique:vehicles,plate_number',
            'vehicle_name' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:100',
            'fuel_type' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255|unique:vehicles,chassis_number',
            'engine_number' => 'required|string|max:255|unique:vehicles,engine_number',
            'gps_device_id' => 'required|string|max:255|unique:vehicles,gps_device_id',
            'assigned_driver' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:1000',
        ]);

        $vehicle = new Vehicle();
        $vehicle->vehicle_code = $request->vehicle_code;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->color = $request->color;
        $vehicle->fuel_type = $request->fuel_type;
        $vehicle->chassis_number = $request->chassis_number;
        $vehicle->engine_number = $request->engine_number;
        $vehicle->gps_device_id = $request->gps_device_id;
        $vehicle->assigned_driver = $request->assigned_driver;
        $vehicle->status = $request->status;
        $vehicle->remarks = $request->remarks;
        $vehicle->created_by = Auth::user()->id;
        $vehicle->save();

        return redirect()->route('admin.vehicle.list')->with('success', 'A new account has been created!');
    }

    public function edit($id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }

        $data['getDriverName'] = User::getDriverName();
        $data['getSingle'] = Vehicle::getSingle($decodedId);
        return view('admin.vehicle.edit',$data);
    }

    
    public function update(Request $request, $id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }

        $vehicle = Vehicle::getSingleRecord($decodedId);

        if (!$vehicle) {
            abort(404);
        }

        $request->validate([
            'vehicle_code' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'vehicle_name' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:100',
            'fuel_type' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'gps_device_id' => 'required|string|max:255',
            'assigned_driver' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:1000',
        ]);

        $vehicle->vehicle_code = $request->vehicle_code;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->color = $request->color;
        $vehicle->fuel_type = $request->fuel_type;
        $vehicle->chassis_number = $request->chassis_number;
        $vehicle->engine_number = $request->engine_number;
        $vehicle->gps_device_id = $request->gps_device_id;
        $vehicle->assigned_driver = $request->assigned_driver;
        $vehicle->status = $request->status;
        $vehicle->remarks = $request->remarks;

        // Preserve the original creator
        // Do not overwrite created_by during an update.

        $vehicle->save();

        return redirect()->route('admin.vehicle.list')
            ->with('success', 'The record has been updated!');
    }


    public function delete($id)
    {
        $vehicle = Vehicle::getSingle($id);

        if (!empty($vehicle)) {
            Gate::authorize('delete-vehicle');
            $vehicle->delete();
            return redirect()->route('admin.vehicle.list')->with('success', 'The record has been deleted!');
        }

        return redirect()->route('admin.vehicle.list')->with('error', 'User record not found.');
    }
}
