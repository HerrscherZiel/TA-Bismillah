<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class MahasiswaAuthController extends Controller
{

    use AuthenticatesUsers;

//    protected $redirectTo = '/dashboard';

    protected $username = 'username';

    /**
     **_ Create a new controller instance.
    _**
     **_ @return void
    _**/
    public function __construct()
    {
        $this->middleware('guest:mahasiswa')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.mahasiswalogin');
    }


    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
//        dd(request()->all());
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->guard('mahasiswa')->attempt(['username' => $request->username, 'password' => $request->password])) {

//            dd(Auth::guard('mahasiswa')->user());
            return redirect()->route('dashboard.index');
        }

//        dd("test");
        return redirect()->back()->withInput($request->only('username', 'remember'));

    }

    /**
    _
    _ @return property guard use for login
    _
    _**/
    public function guard()
    {
        return Auth::guard('mahasiswa');
    }

    public function  logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();
        return redirect()
            ->route('mahasiswa.login');
//            ->route('mahasiswa.login')
    }

}
