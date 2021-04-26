<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transation extends Model
{
	protected $table = "transations";

	protected $fillable = ['donhang_id', 'pay_id', 'masogiaodich','token','discount','sum','status'];

    public function paymethod () {
        return $this->hasOne(Paymethod::class);
    }
    public function donhang(){
        return $this->belongsTo(donhang::class);
    }

}
