<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blood_id','province_id','district_id','first_name','last_name', 'email', 'password','image','birthday','address','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     protected $primaryKey='id';

    public function blood(){
        return $this->belognsTo(Blood::class);
    }

       public function province(){
        return $this->belognsTo(Province::class);
    }

       public function district(){
        return $this->belognsTo(District::class);
    }

     public function emergencyRequests(){
        return $this->hasMany(EmergencyRequest::class);
     }
      public function events(){
        return $this->hasMany(Event::class);
     }
       public function stories(){
        return $this->hasMany(Story::class);
     }
       public function phones(){
        return $this->hasMany(Story::class);
     }
}
