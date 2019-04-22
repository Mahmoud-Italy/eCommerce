<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   static public function getTotal($cartId)
   {
   		$total = 0;
   		foreach(json_decode($cartId) as $cart) {
   			$row = Cart::where('id',$cart)->first();
   			$total += $row->qty * $row->unit_price;
   		}
   		return $total;
   }


}
