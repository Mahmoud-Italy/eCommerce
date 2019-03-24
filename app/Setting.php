<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   static public function getSetting($name)
   {
   	$obj = self::where('name',$name)->first();
    return $obj->content;
   }
}
