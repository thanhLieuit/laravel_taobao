<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table = "products";

    public function chitietdonhang(){
        return $this -> belongsTo(chitietdonhang::class);
    }
}
