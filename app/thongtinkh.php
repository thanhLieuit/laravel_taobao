<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thongtinkh extends Model
{
    protected $table = "thongtinkhs";
    public function admin(){
        return $this -> belongsTo(Admin::class);
    }
    public function nhomhk(){
        return $this ->hasMany(nhomhks::class);
    }
}
