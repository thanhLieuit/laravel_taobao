<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = "carts";
    protected $fillable = ['id','content','key','user_id'];
    public $incrementing = false;

    public function items () {
        return $this->hasMany(CartItem::class);
    }
    public function donhang(){
        return $this -> hasMany(donhang::class);
    }

}
