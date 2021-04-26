<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luulink extends Model
{
    //
    protected $table = "luulinks";

    public function user(){
        return $this -> belongsTo(User::class);
    }
}
