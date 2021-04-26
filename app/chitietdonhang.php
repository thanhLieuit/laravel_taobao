<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    protected $table = "chitietdonhangs";

    protected $fillable = ['donhang_id','name_product','url','size','length','width','height','weight','color','price','quantity','status'];

    public function donhang(){
        return $this -> belongsTo(donhang::class);
    }
    

}
