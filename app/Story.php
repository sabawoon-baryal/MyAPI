<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
	protected $fillable = [
        'user_id','description','image','date_time',
    ];
     protected $hidden = [
        'remember_token',
    ];
     protected $primaryKey='id';
      public function user(){
        return $this->belognsTo(User::class);
    }
}
