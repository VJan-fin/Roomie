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
        'doorman',
        'property_active'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'on_rental');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'on_rental');
    }

    public function propertyPicture()
    {
        return $this->hasMany('App\PropertyPicture', 'on_rental');
    }
}
