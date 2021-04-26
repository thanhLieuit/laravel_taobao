<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietusers extends Model
{
    protected $table = "chitietusers";
    public function user(){
        return $this -> belongsTo(User::class);
    }
}
