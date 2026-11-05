<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use App\Models\User;
use App\Models\GPS;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GPSTrackerController extends Controller
{
    public function list(){
        $data['getRecord'] = GPS::getRecord();
        return view('admin.gpstracker.list',$data);
    }

    public function add(){
        $data['getDriverName'] = User::getDriverName();
        return view('admin.gpstracker.add',$data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'driver_name' => 'required|string|max:255',
            'contact_no' => 'required',
            'license_no' => 'required',
            'gps_device_id' => 'required',
            'driver_id' => 'required',
            'plate_number' => 'required',
            'from_loc' => 'required|string|max:255',
            'to_loc' => 'required|string|max:255',
            'time_departure' => 'required|date_format:H:i',
            'time_arrival' => 'required|date_format:H:i',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'accuracy' => 'required|numeric',
            'google_map' => 'required',
            'travel_status' => 'required',
            'status' => 'required',
        ]);

        $gps = new GPS();
        $gps->driver_name = $request->driver_name;
        $gps->contact_no = $request->contact_no;
        $gps->license_no = $request->license_no;
        $gps->driver_id = $request->driver_id;
        $gps->gps_device_id = $request->gps_device_id;
        $gps->plate_number = $request->plate_number;
        $gps->from_loc = $request->from_loc;
        $gps->to_loc = $request->to_loc;
        $gps->time_departure = $request->time_departure;
        $gps->time_arrival = $request->time_arrival;
        $gps->latitude = $request->latitude;
        $gps->longitude = $request->longitude;
        $gps->accuracy = $request->accuracy;
        $gps->google_map = $request->google_map;
        $gps->travel_status = $request->travel_status;
        $gps->status = $request->status;
        $gps->created_by = Auth::user()->id;
        $gps->save();

        return redirect()->route('admin.gpstracker.list')->with('success', 'A new account has been created!');
    }

    public function map($id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }

        $data['getSingleRecord'] = GPS::getSingleRecord($decodedId);

        if (!$data['getSingleRecord']) {
            abort(404);
        }
        return view('admin.gpstracker.map',$data);
    }

    public function map_view($id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }

        $data['getSingleRecord'] = GPS::getSingleRecord($decodedId);

        if (!$data['getSingleRecord']) {
            abort(404);
        }
        return view('admin.gpstracker.map',$data);
    }

    public function edit($id)
    {

        try {
            $decodedId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
        $data['getSingleRecord'] = GPS::getSingleRecord($decodedId);
        $data['getDriverName'] = User::getDriverName();
        return view('admin.gpstracker.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
        
        $gps = GPS::getSingleRecord($decodedId);

        if (!$gps) {
            abort(404);
        }

        $request->validate([
            'driver_name' => 'required|string|max:255',
            'contact_no' => 'required',
            'license_no' => 'required',
            'gps_device_id' => 'required',
            'driver_id' => 'required',
            'plate_number' => 'required',
            'from_loc' => 'required|string|max:255',
            'to_loc' => 'required|string|max:255',
            'time_departure' => 'required|date_format:H:i',
            'time_arrival' => 'required|date_format:H:i',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'accuracy' => 'required|numeric',
            'google_map' => 'required',
            'travel_status' => 'required',
            'status' => 'required',
        ]);

        $gps = GPS::getSingleRecord($decodedId);
        $gps->driver_name = $request->driver_name;
        $gps->contact_no = $request->contact_no;
        $gps->license_no = $request->license_no;
        $gps->driver_id = $request->driver_id;
        $gps->gps_device_id = $request->gps_device_id;
        $gps->plate_number = $request->plate_number;
        $gps->from_loc = $request->from_loc;
        $gps->to_loc = $request->to_loc;
        $gps->time_departure = $request->time_departure;
        $gps->time_arrival = $request->time_arrival;
        $gps->latitude = $request->latitude;
        $gps->longitude = $request->longitude;
        $gps->accuracy = $request->accuracy;
        $gps->google_map = $request->google_map;
        $gps->travel_status = $request->travel_status;
        $gps->status = $request->status;
        $gps->save();

        return redirect()->route('admin.gpstracker.list')->with('success', 'The record has been updated!');
    }

    public function delete($id)
    {
        $gps = GPS::getSingle($id);
        if (!empty($gps)) {
            Gate::authorize('delete-gps');
            $gps->delete();
            return redirect()->route('admin.gpstracker.list')->with('success', 'The record has been deleted!');
        }

        return redirect()->route('admin.gpstracker.list')->with('error', 'Vehicle record not found.');
    }
}
