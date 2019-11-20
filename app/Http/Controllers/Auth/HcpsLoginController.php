<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;

class HcpsLoginController extends Controller
{
    // constructor 
    public function __construct()
    {
        $this->middleware('guest');
    }
    // function to show login page 
    public function getAdminLogin()
    {
        return view('admin.login');
    }
    // function to process admin login
    public function postAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // login with the admin credentials 
        $credentials = ['hcp_email' => $request->email, 'password' => $request->password];
        if(Auth::guard('hcp')->attempt($credentials, $request->remember))
        {
            return redirect()->intended(route('adminDashboard'));
        }
        // where the login is unsuccessful 
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Your administrative credentials does not match');
    }
}
