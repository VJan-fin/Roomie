<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalUnit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rental_units';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'rent',
        'move_in_from',
        'lease_length',
        'address',
        'city',
        'class',
        'description',
        'num_bedrooms',
        'num_bathrooms',
        'furniture',
        'pets',
        'private_bathroom',
        'air_conditioning',
        'wifi',
        'cable',
        'satellite',
        'elevator',
        'laundry',
        'gym',
        'doorman'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments', 'on_rental');
    }
}
