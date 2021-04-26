<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhavanchuyen extends Model
{
    protected $table = 'nhavanchuyens';
    protected $guarded = [];

   	public function donvan(){
        return $this ->hasMany(donvan::class);
    }
}	
