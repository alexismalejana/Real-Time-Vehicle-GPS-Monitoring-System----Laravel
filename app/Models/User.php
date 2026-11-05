<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getRecordStatus()
    {
        return User::select(
            'users.*',
            'creator.name as creator_name'
        )
            ->leftJoin('users as creator', 'creator.id', '=', 'users.created_by')
            ->orderBy('users.id', 'asc')
            ->get();
    }

    public static function getSingleRecord($id)
    {
        return self::find($id);
    }

    public static function getSingle()
    {
        return self::find(Auth::id());
    }

    public static function getProfile()
    {
        return self::find(Auth::id());
    }

    public static function getDriverName()
    {
        return User::select('users.*')
            ->where('users.position', '=', 'Driver')
            ->where('users.status', '=', 'Active')
            ->get();
    }

    public static function getTotalDriver()
    {
        return User::select('users.*')
            ->where('users.position', '=', 'Driver')
            ->where('users.status', '=', 'Active')
            ->count();
    }
}
