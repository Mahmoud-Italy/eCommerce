<?php

namespace App\Http\Controllers\backend;

use DB;
use Redirect;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Employee;

class OrderCtrl extends Controller
{
    public function index()
    {
    	$data = Order::get();
    	return view('backend.order.list')->withdata($data);
    }

    public function new()
    {
    	// status = 0   New Order
    	$data = Order::where('status',0)->get();
    	return view('backend.order.new')->withdata($data);
    }

    public function pending()
    {
    	// status = 1   Pending... 
    	$data = Order::where('status',1)->get();
    	return view('backend.order.pending')->withdata($data);
    }

    public function completed()
    {
    	// status = 2 Completed
    	$data = Order::where('status',2)->get();
    	return view('backend.order.completed');
    }
}
