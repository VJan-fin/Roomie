<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoommateProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roommate_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'for_user',
        'cleanliness',
        'work_schedule',
        'sleep_schedule',
        'smoking',
        'drinking',
        'privacy',
        'guests',
        'eating_habits',
        'pets',
        'monthly_budget_lower_limit',
        'monthly_budget_upper_limit',
        'move_in_from',
        'lease_length',
        'looking_for',
        'exercise',
        'hobbies'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'for_user');
    }
}
