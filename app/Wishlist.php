<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    static public function getWishlist($pro_id)
    {
    	$user_id = Auth::user()->id;
    	$obj = '';
    	if(self::where('user_id',$user_id)->where('pro_id',$pro_id)->count()) {
    		$obj = 'ti-check';
    	} else {
    		$obj = 'ti-heart';
    	}
    	return $obj;
    }
}
