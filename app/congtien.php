<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class congtien extends Model
{
	protected $table = "congtiens";

   	public function user(){
        return $this -> belongsTo(User::class);
    }
  
}
