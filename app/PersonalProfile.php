<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personal_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'for_user',
        'first_name',
        'last_name',
        'gender',
        'relationship_status',
        'education',
        'occupation',
        'workplace',
        'hometown',
        'location',
        'profile_active',
        'description',
        'image_url'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'for_user');
    }
}
