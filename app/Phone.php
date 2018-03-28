<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	protected $fillable = [
        'user_id','phone',
    ];
     protected $hidden = [
        'remember_token',
    ];
     protected $primaryKey='id';
     
        public function user(){
        return $this->belognsTo(User::class);
    }
}
