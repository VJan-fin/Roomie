<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'for_user',
        'caption',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'for_user');
    }
}
