<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    static public function getTotal()
    {
    	$total = 0;
    	 $data = Cart::where('user_id',Auth::user()->id)->where('status',0)->get();
          foreach($data as $single_data) {
              $total += $single_data->qty * $single_data->unit_price;
          }
         return $total;
    }
}
