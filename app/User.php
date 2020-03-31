<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function scopeActive($query){
        return $query->where('active', 1);

    }
    public function scopeInactive($query){
        return $query->where('active', 0);
    }

    public function scopeOrg($query){
        return $query->where('organization_id', Auth::user()->organization_id);
    }
    
    
}
