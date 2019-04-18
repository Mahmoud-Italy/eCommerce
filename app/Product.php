<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    static public function getProDetail($key, $proId)
    {
    	if(self::where('id',$proId)->count()) {
    		$row = self::where('id',$proId)->first();
    		$obj = $row->$key;
    	} else $obj = '';

    	return $obj;
    }
}
