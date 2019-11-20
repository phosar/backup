<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function getUserLogin(){
        return view('auth.login');
    }

    public function postUserLogin(Request $request){
    
        $this->validate($request, [
            'email' => 'required|min:3',
            'password' => 'required|min:6'
        ]);
        
        // login the user 
        $credentials = ['user_email' => $request->input('email'), 'password' => $request->input('password')];
        if(Auth::attempt($credentials)){
            return redirect()->route('getCart');
        }
        return back()->with('error', 'Email/Password combination does not match. Try again.');
    }

    public function getProfile()
    {
        // fetch the user orders 
        $orders = Auth::user()->orders;
        $orders->transform(function($order){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]);
    }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route("getHome");
    }
    
    public function getUserRegister(){
        return view('auth.register');
    }

    public function postUserRegister(Request $request){
        // validate the user entries
        $this->validate($request, [
            'id' => 'required|string|min:5|max:13',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,user_email',
            'home_telephone' => 'required|numeric|min:10',
            'work_telephone' => 'required|numeric|min:10',
            'address' => 'required|min:10',
            'gender' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password'
        ]);
        // saves the user details in the database 
        $user = new User([
            'user_id' => $request->input('id'),
            'user_name' => $request->input('name'),
            'user_email' => $request->input('email'),
            'user_password' => bcrypt($request->input('password')),
            'user_tel_h' => $request->input('home_telephone'),
            'user_tel_w' => $request->input('work_telephone'),
            'user_addr' => $request->input('address'),
            'user_gender' => $request->input('gender')
        ]);
        $user->save();
        // login the user to their profile 
        //Auth::attempt(['user_email' => $request->input('email'), 'user_password' => $request->input('password')]);
        Auth::login($user);
        // update the cart
        
        // redirect them to their profie page
        return redirect()->route('getUserProfile');
    }
    // show the user profile 
    public function getUserProfile(){
        //$orders = Auth::user()->orders()->orderBy('orders.order_id', 'desc');
        //$orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('order_id', 'desc');
        //$orders = Auth::user()->orders->sortBy('order_id', SORT_REGULAR);
        $orders = Auth::user()->orders->sortByDesc('order_id');
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]);
    }
}

