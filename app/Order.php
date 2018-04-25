<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'status', 'description',
    ];

    /**
     * The Meals that belong to the Order.
     */
    public function meals()
    {
        return $this->belongsToMany('App\Meal')->withPivot('meal_quantity')->withTimestamps();
    }

    /**
     * Get the User that owns an Order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
