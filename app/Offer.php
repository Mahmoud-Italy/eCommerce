<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Offer extends Model
{
    static function getPriceAfterDis($proId) {
    	$pro = Product::find($proId);
    	$obj = 0;
    	if(self::where('pro_id',$proId)
    			->where('startDate','<=',date('Y-m-d'))
    			->where('endDate','>=',date('Y-m-d'))
    			->count()) {

    		$offer = self::where('pro_id',$proId)
    			->where('startDate','<=',date('Y-m-d'))
    			->where('endDate','>=',date('Y-m-d'))
    			->first();

    		$dis_price = $pro->price * $offer->percent / 100;
    		$obj = $pro->price - $dis_price;
    	}
    	return $obj;
    }
}
