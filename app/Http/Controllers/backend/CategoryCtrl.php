<?php

namespace App\Http\Controllers\backend;

use Session;
use Redirect;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryCtrl extends Controller
{
    public function index()
    {
    	$data = Category::get();
    	return view('backend.category.list')->withdata($data);
    }

    public function create()
    {
    	//select * FROM category where parent_id = 0
    	$data = Category::where('parent_id',0)->get();
    	return view('backend.category.create')->withdata($data);
    }

    public function store(Request $request)
    {
    	try {
    		$row = new Category;
    		$row->parent_id = $request->input('parent_id');
    		$row->name = $request->input('cat_name');
    		$row->active = $request->input('active');
    		$row->save();
    		Session::flash('success', 'Category Added Successfully');
    		return Redirect::to('dashboard/categories');
    	} catch (\Exception $e) {
    		Session::flash('error', 'Category Not Added');
    		return Redirect::back();
    	}
    }

    public function edit($id)
    {
    	$row = Category::where('id',$id)->first();
        $data = Category::where('parent_id',0)->get();
        return view('backend.category.edit')->withrows($row)->withdata($data);
    }

    public function update($id,Request $request)
    {
    	try {
            $row = Category::where('id',$id)->first();
            $row->parent_id = $request->input('parent_id');
            $row->name = $request->input('cat_name');
            $row->active = $request->input('active');
            $row->save();
            // \DB::table('categories')->where('id',$id)->update(['name'=>$request->input('cat_name')]);
            Session::flash('success', 'Category Updated Successfully');
            return Redirect::to('dashboard/categories');
        } catch (\Exception $e) {
            Session::flash('error', 'Category Not Updated');
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
    	 try {
             //Category::where('id',$id)->delete();
             $row = Category::where('id',$id)->first();
            if(Category::where('parent_id',$id)->count()) {
                Session::flash('error', 'This Category has SubCategories');
            } else {
                Session::flash('success','Category Deleted Successfully');
                $row->delete();
            }
        
         } catch (\Exception $e) {
            Session::flash('error', 'Category Not Deleted');
         }
         return Redirect::back();
    }


}
