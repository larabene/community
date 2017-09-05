<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param string $password
     */
    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Profile relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * Returns the primary profile.
     *
     * @return Profile|null
     */
    public function primaryProfile()
    {
        return $this->profiles()->where('primary', 1)->first();
    }
}
