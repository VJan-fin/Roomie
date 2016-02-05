<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user',
        'on_rental',
        'rating_points'
    ];

    public function rentalUnit()
    {
        return $this->belongsTo('App\RentalUnit', 'on_rental');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'from_user');
    }
}
