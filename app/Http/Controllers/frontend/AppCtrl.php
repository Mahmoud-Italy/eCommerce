<?php

namespace App\Http\Controllers\frontend;

use Auth;
use Hash;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Cart;
use App\Category;
use App\Product;
use App\Wishlist;

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
            \Session::flash('error','Something went wrong '.$e);
        }
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






    
        #Category
    public function category($name,$id)
    {
        if(!$id || Category::where('id',$id)->count() == 0) {
            return \App::abort(404);
        }
        $cat = Category::find($id);
        $data = Product::where('active',1)->where('cat_id',$id)->get();
        return view('frontend.pages.category')->withcat($cat)->withdata($data);
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
   
   public function cart()
   {    
        // validation of User
       if(!Auth::check()) { return redirect()->to('login'); }

       $data = Cart::where('user_id',Auth::user()->id)->get();
   	  return view('frontend.orders.cart')->withdata($data);
   }


   #Wishlist
   public function wishlist()
   {
       // validation of User
       if(!Auth::check()) { return redirect()->to('login'); }

       $data = Wishlist::where('user_id',Auth::user()->id)->get();
       return view('frontend.orders.wishlist',compact('data'));
   }
   public function addWishlist(Request $request)
   {
       try {
           $row = new Wishlist;
           $row->user_id = Auth::user()->id;
           $row->pro_id = $request->pro_id;
           $row->save();
           $status = true;
       } catch (\Exception $e) {
           $status = false;
       }
       return response()->json(['success'=>$status]);
   }
   public function addCart(Request $request)
   {
       try {
           $row = new Cart;
           $row->user_id = Auth::user()->id;
           $row->pro_id = $request->pro_id;
           $row->qty = 1;
           $row->unit_price = Product::getProDetail('price', $request->pro_id); 
           $row->save();
           $status = true;
       } catch (\Exception $e) {
           $status = false;
       }
       return response()->json(['success'=>$status]);
   }
   public function destroyWishlist($id)
   {
       if(Wishlist::where('id',$id)->where('user_id',Auth::user()->id)->count()) {
         Wishlist::where('id',$id)->where('user_id',Auth::user()->id)->delete();
         Session::flash('success','Wishlist Deleted Successfully'); 
       } else  {
         Session::flash('error','Wishlist Access Denied'); 
       }
       return redirect()->back();
   }
    

}
