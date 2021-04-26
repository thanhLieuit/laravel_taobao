<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khieunai extends Model
{
    protected $table = "khieunais";

    public function donhang(){
        return $this -> belongsTo(donhang::class);
    }
    

}
