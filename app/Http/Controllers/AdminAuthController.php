<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class AdminAuthController extends Controller
{
    //
    use AuthenticatesUsers;

//    protected $redirectTo = '/dashboard';

    /**
     **_ Create a new controller instance.
    _**
     **_ @return void
    _**/
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }


    public function login(Request $request)
    {
//        dd(request()->all());
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);


        if(auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

//            dd(Auth::guard('dosen')->user());
            return redirect()->route('admin.dashboard');
        }

//        dd("test");
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    /**
    _
    _ @return property guard use for login
    _
    _**/
    public function guard()
    {
        return Auth::guard('admin');
    }

    public function  logout()
    {

        if(auth()->guard('admin')){
            Auth::guard('admin')->logout();
            return redirect()
                ->route('login');
        }

//            ->route('mahasiswa.login')
    }

}
