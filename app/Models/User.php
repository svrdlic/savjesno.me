<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'username', 'first_name', 'last_name', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function social()
    {
        return $this->hasMany(Social::class);
    }


    /**
     * Create unique username slug
     * @param $username
     * @return string
     */
    public static  function createUniqueSlug( $username )
    {

        $slug = str_slug($username);

        $profile = User::where('slug', '=', $slug)->first();

        if ( !empty($profile) ) {
            $slug .= '-' . str_random(3);
        }

        return $slug;
    }



}
