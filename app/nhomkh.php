<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomkh extends Model
{
    protected $table = "nhomkhs";
    public function thongtinkh(){
        return $this -> belongsTo(thongtinkhs::class);
    }
}
