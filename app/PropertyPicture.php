<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyPicture extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'on_rental',
        'caption',
    ];

    public function rentalUnit()
    {
        return $this->belongsTo('App\RentalUnit', 'on_rental');
    }
}
