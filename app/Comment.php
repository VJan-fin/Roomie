<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'from_user',
        'on_rental'
    ];

    public function rentalUnit()
    {
        return $this->belongsTo('App\RentalUnit', 'on_rental');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'from_user');
    }

    /*
    public function getCreatedAtAttribute($value)
    {
        $time = Carbon::createFromTimestamp(strtotime($value));
        return $time->format('M d,Y \a\t H:i');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc')->take(5);
    }
    */
}
