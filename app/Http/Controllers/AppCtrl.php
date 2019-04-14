<?php

namespace App\Http\Controllers;

use Redirect;
use Session;
use App\Category;
use Illuminate\Http\Request;


class AppCtrl extends Controller
{


    public function index()
    {
    	if(isset($_GET['search'])) {
          $data = Category::where('name','LIKE','%'.$_GET['search'].'%')->orderBy('id','DESC')->get();
    	} else {
    	  $data = Category::orderBy('id','DESC')->get();
    	}
    	return view('app')->withdata($data);
    }
    public function create()
    {
    	return view('create');
    }
    public function doCreate(Request $request)
    {
       try {
	    	$row = New Category;
	    	$row->name = $request->input('name');
	    	$row->content = $request->input('content');
	    	$row->save();
            Session::flash('success','Category Added Successfully');
    	} catch (\Exception $e) {
       	    Session::flash('error','Category Not Added');
       }
       
       return Redirect::to('/');
    }


    public function editCategory($categoryId)
    {
    	$row = Category::where('id',$categoryId)->first();
    	return view('edit')->withrow($row);
    }

    public function updateCategory($categoryId,Request $request)
    {
    	try {
	    	$row = Category::where('id',$categoryId)->first();
	    	$row->name = $request->input('name');
	    	$row->content = $request->input('content');
	    	$row->save();
            Session::flash('success','Category Updated Successfully');
    	} catch (\Exception $e) {
       	    Session::flash('error','Category Not Updated');
       }
       return Redirect::to('/');
    }


    public function destroyCategory($categoryId)
    {
    	try {
    		Category::where('id',$categoryId)->delete();
    		Session::flash('success','Category Deleted Successfully');
    	} catch (\Exception $e) {
    		Session::flash('error','Category Not Deleted');
    	}
    	return Redirect::back();
    }

    



}
