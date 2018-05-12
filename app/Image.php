<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'route', 'user_id' ,'meal_id',
    ];

    /**
     * Get the User that has an Image.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the Meal that has an Image.
     */
    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
}
