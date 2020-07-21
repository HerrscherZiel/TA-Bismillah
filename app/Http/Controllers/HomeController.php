<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Admin;
use App\Mahasiswa;
use Hash;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }

    public function changePassword()
    {
        return view('auth.changePassword');
    }

    public function saveNewPassword(Request $request){

        $this->validate($request, [
            'passwordLama' => 'required | min:6',
            'passwordBaru' => 'required | min:6',
            'konfirmasiPassword' => 'required | same:passwordBaru'
        ]);


            // dd($request);

        if(Auth::guard('admin')->check()){
            
            $passLama = Auth::guard('admin')->user()->password;

            // dd($passLama);

            $checkOldPass = Hash::check($request->passwordLama, Auth::guard('admin')->user()->password);

            if($checkOldPass == TRUE){

                // dd($checkOldPass);

                $newpass                     = Admin::findOrFail(Auth::guard('admin')->user()->id_admin);
                $newpass->password           = bcrypt($request->passwordBaru);
                $newpass->save();

                return back()->with('success','Password berhasil diubah');

            }

            else{

                return back()->with('error','Password lama salah');

            }


        }

        elseif(Auth::guard('dosen')->check()){
            
            $passLama = Auth::guard('dosen')->user()->password;

            // dd($passLama);

            $checkOldPass = Hash::check($request->passwordLama, Auth::guard('dosen')->user()->password);

            if($checkOldPass == TRUE){

                // dd($checkOldPass);

                $newpass                     = Dosen::findOrFail(Auth::guard('dosen')->user()->id_dosen);
                $newpass->password           = bcrypt($request->passwordBaru);
                $newpass->save();

                return back()->with('success','Password berhasil diubah');

            }

            else{

                return back()->with('error','Password lama salah');

            }
        }

        elseif(Auth::guard('mahasiswa')->check()){
            
            $passLama = Auth::guard('mahasiswa')->user()->password;

            // dd($passLama);

            $checkOldPass = Hash::check($request->passwordLama, Auth::guard('mahasiswa')->user()->password);

            if($checkOldPass == TRUE){

                // dd($checkOldPass);

                $newpass                     = Mahasiswa::findOrFail(Auth::guard('mahasiswa')->user()->id_mahasiswa);
                $newpass->password           = bcrypt($request->passwordBaru);
                $newpass->save();

                return back()->with('success','Password berhasil diubah');

            }

            else{

                return back()->with('error','Password lama salah');

            }
        }

    }

}
