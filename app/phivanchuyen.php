<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phivanchuyen extends Model
{
    protected $table = "phivanchuyens";

    public function donhang(){
        return $this -> belongsTo(donhang::class);
    }

}
