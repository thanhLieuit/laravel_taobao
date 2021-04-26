<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymethod extends Model
{
	protected $table = "paymethods";

    public function transation(){
        return $this -> hasOne(Transation::class);
    }
    public function naptien(){
        return $this ->hasMany(naptien::class);
    }

}
