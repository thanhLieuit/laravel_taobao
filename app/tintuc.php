<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    protected $table = "tintucs";
    public function theloai(){
        return $this -> belongsTo('App\theloai','id_tl','id');
    }
}
