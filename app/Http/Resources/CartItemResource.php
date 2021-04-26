<?php

namespace App\Http\Resources;
use App\product;


use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
     
       $product = product::find($this->product_id);
     
        return [
            'productID' => $this->product_id,
            
            'price' => $product->price,
            'Name' => $product->Name,
            'Quantity' => $this->quantity,
        ];
    }
}
