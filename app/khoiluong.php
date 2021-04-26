<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khoiluong extends Model
{
    protected $table = "khoiluongs";

    public function donhang(){
        return $this -> belongsTo(donhang::class);
    }

}
