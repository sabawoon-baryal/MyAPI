<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	protected $fillable = [
        'name',
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

        public function events(){
     	return $this->hasMany(Event::class);
     }
       public function districts(){
        return $this->hasMany(District::class);
     }
}
