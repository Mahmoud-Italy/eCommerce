<?php

namespace App\Http\Controllers\backend;

use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Offer;
use App\User;
use App\Product;


class OfferCtrl extends Controller
{
    public function index()
    {
    	$data = Offer::paginate(20);
    	$row = User::find(2);
    	Mail::send('emails.test', ['user' => $row], function($message) use($row) {
            $message->to('mahmoud.italy@outlook.com', 'MH')->subject('test mail from localhost');
         });
    	return view('backend.offer.list')->withdata($data);
    }

    public function create()
    {
    	$products = Product::get();
    	return view('backend.offer.create')->withproducts($products);
    }

    public function store(Request $request)
    {
    	try {
    		$row = new Offer;
    		$row->pro_id = $request->pro_id;
    		$row->percent = $request->percent;
    		$row->startDate = $request->start_date;
    		$row->endDate = $request->input('end_date');
    		$row->save();
    		Session::flash('success','Offer Created Successfully');
    		return redirect()->to('dashboard/offers');
    	} catch (\Exception $e) {
    		Session::flash('error','Offer Not Added');
    		return redirect()->back();
    	}
    }

    public function edit($id)
    {
    	$row = Offer::find($id);
    	$products = Product::get();
    	return view('backend.offer.edit')->withrow($row)->withproducts($products);
    }

    public function update($id, Request $request)
    {
    	try {
    		$row = Offer::find($id);
    		$row->pro_id = $request->pro_id;
    		$row->percent = $request->percent;
    		$row->startDate = $request->start_date;
    		$row->endDate = $request->input('end_date');
    		$row->save();
    		Session::flash('success','Offer Updated Successfully');
    		return redirect()->to('dashboard/offers');
    	} catch (\Exception $e) {
    		Session::flash('error','Offer Not Updated');
    		return redirect()->back();
    	}
    }

    public function destroy($id)
    {
    	try {
    		Offer::where('id',$id)->delete();
    		Session::flash('success','Offer Deleted Successfully');
    	} catch (\Exception $e) {
    		Session::flash('success','Offer Not Deleted');
    	}
    	return redirect()->back();
    }



}
