<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room', 'status', 'user_id',
    ];

    /**
     * Get the User that owns a Room.
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
