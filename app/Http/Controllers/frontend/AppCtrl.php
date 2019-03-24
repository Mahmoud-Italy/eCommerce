<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppCtrl extends Controller
{
    
    public function index()
    {
    	return view('frontend.layouts.index');
    }

    public function category()
    {
    	return view('frontend.pages.category');
    }

    public function login()
    {
    	return view('frontend.pages.login');
    }

    public function contact()
    {
    	return view('frontend.pages.contact');
    }

    public function search()
    {
    	// get Data from DB
    	return view('frontend.pages.search');
    }
   
   public function cart($value='')
   {
   	  return view('frontend.orders.cart');
   }
    

}
