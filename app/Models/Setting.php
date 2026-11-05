<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{   
    use HasFactory;

    protected $table = 'setting';

    protected $fillable = [
        'favicon',    
        'logo',
        'app_name',
        'website',
        'release_date',
        'developer',
        'version',
        'api',
    ];


    static public function getSetting(){
        return self::find(1);
    }
}