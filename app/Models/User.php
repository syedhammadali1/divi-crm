<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Silber\Bouncer\Database\Concerns\HasRoles;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasFactory, Notifiable ,HasRolesAndAbilities , SoftDeletes, HasRoles ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'two_factor_code',
        'two_factor_expires_at',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'two_factor_expires_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function roles()
//    {
//        return $this->belongsTo('App\Models\attributes', 'role_id', 'id');
//    }

    public function designations()
    {
        return $this->belongsTo('App\Models\attributes', 'designation', 'id');
    }

    public function departments()
    {
        return $this->belongsTo('App\Models\attributes', 'department', 'id');
    }

    public function clientProjects()
    {
        return $this->hasMany('App\Models\projects', 'client_email', 'email');
    }
    public function emp_department()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department');
    }
    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    /**
     * @return bool
     */
    public function isUserOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
    public function forceUserOffline()
    {
        return Cache::put('user-is-online-'. $this->id,false, Carbon::now());
    }

//    public function roles() // todo wrong relationship
//    {
//        return $this->belongsTo(role::class, 'role_id');
//    }
}
