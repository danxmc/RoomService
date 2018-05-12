<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'category',
    ];

    /**
     * The Orders that belong to the Meal.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('meal_quantity')->withTimestamps();
    }

    /**
     * The Images that belong to the Meal.
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
