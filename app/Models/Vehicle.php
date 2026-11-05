<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{   
    protected $table = 'vehicles';

    protected $fillable = [
        'vehicle_code',
        'plate_number',
        'vehicle_name',
        'vehicle_type',
        'make',
        'model',
        'year',
        'color',
        'fuel_type',
        'chassis_number',
        'engine_number',
        'gps_device_id',
        'assigned_driver',
        'status',
        'remarks',
        'created_by',
    ];

    public static function getRecord()
    {
        return Vehicle::select('vehicles.*','creator.name as created_by')
                    ->leftJoin('users as creator', 'creator.id', '=', 'vehicles.created_by')
                    ->orderBy('vehicles.id', 'asc')
                    ->get();
    }

    public static function getSingleRecord($id)
    {
        return self::find($id);
    }

    public static function getTotalVehicle()
    {
        return Vehicle::select('vehicles.*')->count();
    }

    public static function getTotalVehicleForMaintenance()
    {
        return Vehicle::select('vehicles.*')
                ->where('vehicles.remarks','=','For Maintenance')
                ->count();
    }
}