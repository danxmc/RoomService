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
        'name', 'email', 'password', 'role', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The Orders that belong to the User.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * The Room that the User has.
     */
    public function room()
    {
        return $this->hasOne('App\Room');
    }

    /**
     * The Image that the User has.
     */
    public function image()
    {
        return $this->hasOne('App\Image');
    }
}
