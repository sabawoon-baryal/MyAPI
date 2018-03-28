<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
        'user_id','province_id','district_id','description','location','date_time',
    ];
     protected $hidden = [
        'remember_token',
    ];
     protected $primaryKey='id';
     
    public function user(){
        return $this->belognsTo(User::class);
    }
     public function province(){
        return $this->belognsTo(Province::class);
    }
     public function district(){
        return $this->belognsTo(District::class);
    }
}
