<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GPS extends Model
{
    protected $table = 'gps';

    protected $fillable = [
        'driver_name',
        'contact_no',
        'license_no',
        'gps_device_id',
        'driver_id',
        'plate_number',
        'from_loc',
        'time_departure',
        'time_arrival',
        'latitude',
        'longitude',
        'accuracy',
        'google_map',
        'status',
    ];

    public static function getRecord()
    {
        return GPS::select('gps.*','creator.name as created_by')
                    ->leftJoin('users as creator', 'creator.id', '=', 'gps.created_by')
                    ->orderBy('gps.id', 'asc')
                    ->get();
    }

    public static function getSingleRecord($id)
    {
        return self::find($id);
    }

    public static function getTotalVehicleOnTransit()
    {
        return GPS::select('gps.*')
                ->where('gps.travel_status','=','In Transit')
                ->where('gps.status','=','Active')
                ->count();
    }

    public static function getTotalVehicleParked()
    {
        return GPS::select('gps.*')
                ->where('gps.travel_status','=','Parked')
                ->where('gps.status','=','Active')
                ->count();
    }

    public static function getTotalVehicleStopped()
    {
        return GPS::select('gps.*')
                ->where('gps.travel_status','=','Stopped')
                ->where('gps.status','=','Active')
                ->count();
    }

    public static function getTotalVehicleOffline()
    {
        return GPS::select('gps.*')
                ->where('gps.travel_status','=','Offline')
                ->where('gps.status','=','Inactive')
                ->count();
    }

    public static function getTotalVehicleActiveGoogleMap()
    {
        return GPS::select('gps.*')
                ->where('gps.travel_status','=','Travel Ongoing')
                ->where('gps.status','=','Active')
                ->count();
    }
}