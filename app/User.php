<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
        'profile_active',
        'registration_complete'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function personalProfile()
    {
        return $this->hasOne('App\PersonalProfile', 'for_user');
    }

    public function roommateProfile()
    {
        return $this->hasOne('App\RoommateProfile', 'for_user');
    }

    public function rentalUnit()
    {
        return $this->hasMany('App\RentalUnit');
    }

    public function profileImage()
    {
        return $this->hasOne('App\ProfileImage', 'for_user');
    }

    public function getCreatedAtAttribute($value)
    {
        $time = Carbon::createFromTimestamp(strtotime($value));
        return $time->format('M d,Y \a\t H:i');
    }
}
