<?php

namespace App\Http\Controllers\backend;

use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideCtrl extends Controller
{
    public function index()
    {
    	$data = Slide::all();
    	return view('backend.slide.list')->withdata($data);
    }

    public function create()
    {
    	return view('backend.slide.create');
    }

    public function store(Request $request)
    {
    	try {
    		   $request->validate([
                  // 'image' => 'mimetypes:image'
    		   ]);

    		    // uploading Image
    		    $path = 'uploads/slides/';
    		    $file = $request->file('image');
    		    $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
    		    $file->move(public_path().'/'.$path,$filename);

    		// INSERT INTO DB
    		$row = new Slide;
    		$row->image = $path.$filename;
    		$row->title = $request->input('title');
    		$row->content = $request->input('content');
    		$row->sort = $request->input('sort');
    		$row->active = $request->input('active');
            $row->save();
            Session::flash('success','Slide Added Successfully');
            return Redirect::to('dashboard/slides');
    	} catch (\Exception $e) {
    		Session::flash('error','Slide Not Added');
    		return Redirect::back();
    	}
    }

    public function edit($id)
    {
    	if(!$id || Slide::where('id',$id)->count() == 0) {
    		return \App::abort(404);
    	}

    	$row = Slide::find($id);
    	return view('backend.slide.edit')->withrow($row);
    }

    public function update($id, Request $request)
    {
    	if(!$id || Slide::where('id',$id)->count() == 0) {
    		return \App::abort(404);
    	}

        
        try {
    		   $request->validate([
                  // 'image' => 'mimetypes:image'
    		   ]);

    		// INSERT INTO DB
    		$row = Slide::find($id);
    		  if($request->hasFile('image')) {
    		  	  // uploading Image
    		    $path = 'uploads/slides/';
    		    $file = $request->file('image');
    		    $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
    		    $file->move(public_path().'/'.$path,$filename);
    			$row->image = $path.$filename;
    		  }
    		
    		$row->title = $request->input('title');
    		$row->content = $request->input('content');
    		$row->sort = $request->input('sort');
    		$row->active = $request->input('active');
            $row->save();
            Session::flash('success','Slide Updated Successfully');
            return Redirect::to('dashboard/slides');
    	} catch (\Exception $e) {
    		Session::flash('error','Slide Not Updated');
    		return Redirect::back();
    	}

    }

    public function destroy($id)
    {
    	if(!$id || Slide::where('id',$id)->count() == 0) {
    		return \App::abort(404);
    	}

		try {
			Slide::where('id',$id)->delete();
    		Session::flash('success','Slide Deleted Successfully');
		} catch (\Exception $e) {
			Session::flash('error','Slide Not Deleted');
		}
		return Redirect::back();
    }
}
