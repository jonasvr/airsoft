<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname','function_id','birthday',
        'gsm','callsign','AAB_Lidnummer','aansluiting'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function geweren()
    {
        return $this->hasMany('App\geweren','user_id','id');
    }

    public function Status()
    {
        return $this->hasMany('App\Status','id','status');
    }

    public function statusses()
    {
        return $this->belongsToMany('App\Status');
    }
}
