<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class naptien extends Model
{
	protected $table = "naptiens";

   	public function user(){
        return $this -> belongsTo(User::class);
    }
    public function donhang(){
        return $this -> belongsTo(donhang::class);
    }
     public function congtien () {
        return $this->belongsTo(congtien::class);
    }
}
