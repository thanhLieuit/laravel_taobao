<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    protected $table = "donhangs";

    protected $fillable = ['user_id', 'madonhang','totalqty','note','status','coc'];

    public function chitietdonhang(){
        return $this ->hasMany(chitietdonhang::class);
    }
    public function khieunai(){
        return $this ->hasMany(khieunai::class);
    }
    public function user(){
        return $this -> belongsTo(User::class);
    }
    public function cart(){
        return $this ->belongsTo(Cart::class);
    }
    public function transation(){
        return $this ->hasMany(Transation::class);
    }
    public function phivanchuyen(){
        return $this ->hasMany(phivanchuyen::class);
    }
    public function khoiluong(){
        return $this -> belongsTo(khoiluong::class);
    }
    public function naptien(){
        return $this ->hasMany(naptien::class);
    }
    public function donvan(){
        return $this ->hasMany(donvan::class);
    }
}
