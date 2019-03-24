<?php

namespace App\Http\Controllers\backend;

use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class MemberCtrl extends Controller
{
    public function index()
    {
    	$data = User::where('role_id',0)->get();
    	return view('backend.member.list')->withdata($data);
    }

   public function suspend($id)
   {
        // suspend = 1;
   	    User::where('id',$id)->update(['suspend'=>1]);
   	    Session::flash('success','Member is Suspended');
   	    return Redirect::back();
   }

   public function restore($id)
   {
        // suspend = 0;
   	    User::where('id',$id)->update(['suspend'=>0]);
   	    Session::flash('success','Member is Restored');
   	    return Redirect::back();
   }

}
