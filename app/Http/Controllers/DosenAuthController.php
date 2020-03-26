<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class DosenAuthController extends Controller
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
        $this->middleware('guest:dosen')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.dosenlogin');
    }


    public function login(Request $request)
    {
//        dd(request()->all());
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->guard('dosen')->attempt(['email' => $request->email, 'password' => $request->password])) {

//            dd(Auth::guard('dosen')->user());
            return redirect()->route('dosen.dashboard');
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
        return Auth::guard('dosen');
    }

    public function  logout()
    {
        if(auth()->guard('dosen')){
        Auth::guard('dosen')->logout();
        return redirect()
            ->route('login');
        }

//            ->route('mahasiswa.login')
    }
}
