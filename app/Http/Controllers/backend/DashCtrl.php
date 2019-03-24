<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashCtrl extends Controller
{
    public function index() 
    {
         return view('backend.layouts.index');
    }

    public function category()
    {
    	return view('backend.category.list');
    }

    public function categoryCreate()
    {
    	return view('backend.category.create');
    }


}
