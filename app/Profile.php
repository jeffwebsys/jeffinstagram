<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = [];
    //

    public function profileImage(){

    	$imagePath = ($this->image) ?  $this->image : 'profile/zL5dtv8QMbZIyEgOs3gBXbNbyNyA3UZlu2XjRt4L.png';

    	return '/storage/' . $imagePath;
    }
    public function user(){
        //a profile belongs to a user

    	return $this->belongsTo(User::class);
    }
    //a profile can have many user as followers
    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
