<?php

namespace App\Http\Controllers\frontend;

use Auth;
use Hash;
use Session;
use Redirect;
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
            // $request->validate([
            //     'name' => 'required|max:255',
            //     'email' => 'required|email|unique:users',
            //     'password' => 'required|min:6'
            // ]);

                $emptErrors=array();
                $name=$request->input('name');
                $mail=$request->input('email');
                $password=$request->input('password');
                
                if(!$name) {
                    $emptErrors[] = 'name Required';
                }
                if(!$mail) {
                    $emptErrors[] = 'Email Required';
                }
                if(!$password) {
                    $emptErrors[] = 'Password Required';
                }
              

                Session::put('emptErrors', $emptErrors); 
   

        // try {
        //     #Create New User
        //     $row = new User;
        //     $row->name = $request->input('name');
        //     $row->email = $request->input('email');
        //     $row->password = \Hash::make($request->input('password'));
        //     $row->save();
        //     \Session::flash('success','User Register Successfully');
        // } catch(\Exception $e) {
        //     \Session::flash('error','Something went wrong '.$e);
        // }
        return \Redirect::back();
    }

    #Forget Password
    public function forget()
    {
       return view('frontend.pages.forget');
    }
    public function doForget(Request $request)
    {
        #Validation
        $request->validate([
                'email' => 'required|email',
        ]);

        try {
            $email = $request->input('email');
            if(User::where('email',$email)->count() == 0) {
                Session::flash('error', 'Email Address is not exists');
            } else {
                //1. Update User
                $row = User::where('email',$email)->first();
                $row->activation_key = $row->id.''.uniqid(md5($email));
                $row->save();

                //2. Send Reset Link
                Session::flash('success', 'Please Click link below to reset your password');
                Session::flash('key', $row->activation_key);
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong '.$e);
        }
        return Redirect::back();
    }

    #Reset Password
    public function reset($key)
    {
        if(User::where('activation_key',$key)->count() == 0) {
            Session::flash('error', 'Activation key expired');
            return Redirect::back();
        } else {
            return view('frontend.pages.reset');
        }
    }

    public function doReset($key,Request  $request)
    {
       if(User::where('activation_key',$key)->count() == 0) {
          Session::flash('error', 'Activation key expired');
          return Redirect::back();
       } else if ($request->input('password') != $request->input('confirm_password')) {
         Session::flash('error', 'Passwords Not Match');
         return Redirect::back();
       } else {
          $row = User::where('activation_key',$key)->first();
          $row->password = Hash::make($request->input('password'));
          $row->activation_key = NULL;
          $row->save();
          Session::flash('success', 'Password Reset Successfully');
          return Redirect::to('login');
       }
       
    }

    public function logout() 
    {
       \Auth::logout();
       return Redirect::back();
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
