<?php

namespace App\Http\Controllers\backend;

use App;
use File;
use Session;
use Redirect;
use Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductCtrl extends Controller
{
   
    public function index()
    {
        if(isset($_GET['q'])) {
            $q = $_GET['q'];
            $data = Product::where('name','LIKE','%'.$q.'%')->orderBy('id','DESC')->paginate(10);
        } else {
            $data = Product::orderBy('id','DESC')->paginate(10);
        }
        return view('backend.product.list')->withdata($data);
    }

    
    public function create()
    {
       return view('backend.product.create');
    }

    public function store(Request $request)
    {
        try {
            $row = new Product;
            $row->cat_id = $request->input('cat_id');
               
               // $file = $request->file('image');
               // $path = 'uploads/products/';
               // $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
               // //$file->move(public_path().'/'.$path,$filename);
               // $file = Image::make($path,$filename);

            $file = $request->file('image');
            $path = 'uploads/products/';
            $filename = time().'.'.$file->getClientOriginalExtension();
            // ->resize(300,200) to crop images to this diemention
            Image::make($file)->save(public_path().'/'.$path.$filename, 100)->resize(300, 200);

            $row->image = $path.$filename;
            $row->name = $request->input('name');
            $row->qty = $request->input('qty');
            $row->price = $request->input('price');
            $row->price_discount = $request->input('price_discount');
            $row->content = $request->input('content');
            $row->active = $request->input('active');
            $row->save();
            Session::flash('success',' Product Added Successfully');
            return Redirect::to('dashboard/products');
        } catch (\Exception $e) {
            dd($e);
            Session::flash('error', 'Product Not Added '.$e);
            return Redirect::back();
        }
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        if(!$id || Product::where('id',$id)->count() == 0 ) {
            return App::abort(404);
        } else {
           $row = Product::find($id);
           return view('backend.product.edit')->withrow($row);
        }
    }

   
    public function update(Request $request, $id)
    {
         if(!$id || Product::where('id',$id)->count() == 0 ) {
            return App::abort(404);
        } else {
            try {
                $row = Product::find($id);
                $row->cat_id = $request->input('cat_id');
               
              
            if($request->hasFile('image')) {
                File::Delete($row->image);
               $file = $request->file('image');
               $path = 'uploads/products/';
               $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
               $file->move(public_path().'/'.$path,$filename);
                $row->image = $path.$filename;
            }

                $row->name = $request->input('name');
                $row->qty = $request->input('qty');
                $row->price = $request->input('price');
                $row->price_discount = $request->input('price_discount');
                $row->content = $request->input('content');
                $row->active = $request->input('active');
                $row->save();
                Session::flash('success',' Product Updated Successfully');
                return Redirect::to('dashboard/products');
            } catch (\Exception $e) {
                Session::flash('error',' Product Not Updated');
                return Redirect::back();
            }
        }
    }

   
    public function destroy($id)
    {
        if(!$id || Product::where('id',$id)->count() == 0 ) {
            return App::abort(404);
        } else {
            try {
                $row = Product::find($id);
                File::Delete($row->image);
                $row->delete();
                Session::flash('success','Product Deleted Successfully');
            } catch (\Exception $e) {
                Session::flash('error','Product Not Deleted');
            }
            return Redirect::back();
        }
    }
}
