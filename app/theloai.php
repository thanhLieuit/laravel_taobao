<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    protected $table = "theloais";
    public function tintuc(){
        return $this ->hasMany('App\tintuc','id_tl','id');
    }
}
