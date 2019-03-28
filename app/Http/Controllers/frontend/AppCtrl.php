<?php

namespace App\Http\Controllers\frontend;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AppCtrl extends Controller
{
    
    public function index()
    {
    	return view('frontend.layouts.index');
    }

    #Login
    public function login()
    {
        if(Auth::check()) { return \Redirect::to('/'); }
    	return view('frontend.pages.login');
    }

    public function doLogin(Request $request)
    {
        #Validation 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $data = ["email"=>$email,"password" =>$password];
        if(\Auth::attempt($data, true)) {
            return \Redirect::to('/');
        } else {
           Session::flash('error','Email \ Password Incorrect');
           return \Redirect::back();
        }
    }

    #Register
    public function doRegister(Request $request)
    {
            #Validation 
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ]);

        try {
            #Create New User
            $row = new User;
            $row->name = $request->input('name');
            $row->email = $request->input('email');
            $row->password = \Hash::make($request->input('password'));
            $row->save();
            \Session::flash('success','User Register Successfully');
        } catch(\Exception $e) {
            \Session::flash('error','Semething went wrong');
        }
        return \Redirect::back();
    }

    public function logout() 
    {
       \Auth::logout();
       return \Redirect::back();
    }






    public function category()
    {
        return view('frontend.pages.category');
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
