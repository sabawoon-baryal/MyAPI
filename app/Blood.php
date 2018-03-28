<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
	protected $fillable = [
        'type',
    ];
     protected $hidden = [
        'remember_token',
    ];
     protected $primaryKey='id';
     public function users(){
     	return $this->hasMany(User::class);
     }
     public function emergencyRequests(){
     	return $this->hasMany(EmergencyRequest::class);
     }
     
}
