<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:mahasiswa');
//
//    }

    public function indexMahasiswa()
    {


        return view('mahasiswa.dashboard.index');
    }

    public function indexDosen()
    {

//        $data = ::with('proyek', 'periode')->get()
        return view('dosen.dashboard.index');

    }

    public function indexAdmin()
    {

//        $data = ::with('proyek', 'periode')->get()
        return view('admin.dashboard.index');

    }

    public function detailProject()
    {
        return view('mahasiswa.dashboard.detailProject');
    }
}
