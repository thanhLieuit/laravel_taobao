<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = "cart_items";
    protected $fillable = ['cart_id','aliwangwang','shopId','shopName','shopLink','website', 'quantity','itemName','itemLink','size','itemPriceNDT','color','price','status','itemImage','saleLocation','stock'];
    // protected $primaryKey = ['cart_id', 'product_id'];

    public $incrementing = false;

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    
}
