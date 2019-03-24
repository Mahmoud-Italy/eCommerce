<?php

namespace App\Http\Controllers\backend;

use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingCtrl extends Controller
{
    public function index()
    {
    	return view('backend.setting.list');
    }

    public function metaTags(Request $request)
    {
    	try {
    		//1.
    		$row = Setting::where('name','meta_author')->first();
    		$row->content = $request->input('meta_author');
    		$row->save();

    		//2.
    		$row2 = Setting::where('name','meta_keywords')->first();
    		$row2->content = $request->input('meta_keywords');
    		$row2->save();

    		//3. 
    		$row3 = Setting::where('name','meta_description')->first();
    		$row3->content = $request->input('meta_desc');
    		$row3->save();
    		
           Session::flash('success','Meta Tags Updated Successfully');
    	} catch (\Exception $e) {
    		Session::flash('error','Meta Tags Not Updated');
    	}
    	return Redirect::back();
    }


}
