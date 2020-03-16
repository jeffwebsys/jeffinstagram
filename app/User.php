<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'username', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected static function boot(){
        parent::boot();
        static::created(function ($user){
            $user->profile()->create([
                'title' => 'Enjoy your profile',
                'url' => 'http://jeffinstagram.com',
                'description' => 'Jeremiah 29:11',
            ]);

        });

        
    }
    public function following(){
        //a user can follow many profile

        return $this->belongsToMany(Profile::class);
    }

    public function posts(){
        // a user can have many posts

        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }
        //a user can have only one profile
    public function profile(){

        return $this->hasOne(Profile::class);
    }
}
