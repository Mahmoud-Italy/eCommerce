<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function childs() {
      return $this->hasMany('App\Category', 'parent_id', 'id'); 
    }
    
    static public function getCategoryName($catid)
    {
    	if(self::where('id',$catid)->count()) {
    		$row = self::where('id',$catid)->first();
            //DB::table('users')->where('votes',100)->get();
            //User::where('votes',100)->get();
    		$obj = '<label class="btn btn-success">'.$row->name.'</label>';
    	} else {
    		$obj = '<label class="btn btn-primary">Main Category</label>';
    	}
    	return $obj;
    }

    static public function getActive($active) 
    {
    	if($active == 1) {
    		$obj = '<label class="btn btn-primary">Actived</label>';
    	} else {
            $obj = '<label class="btn btn-danger">DeActived</label>';
    	}
       
       return $obj;
    }

    static public function getCatName($cat_id)
    {
        $row = self::where('id',$cat_id)->first();
        $obj = '<label class="btn btn-success">'.$row->name.'</label>';
        return $obj;
    }
}
