<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donvan extends Model
{
    protected $table = 'donvans';
    protected $guarded = [];

    public function donhang(){
        return $this -> belongsTo(donhang::class);
    }
    public function nhavanchuyen(){
        return $this -> belongsTo(nhavanchuyen::class);
    }
   
}
