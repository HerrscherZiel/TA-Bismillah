<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard.index');
    }

    public function detailProject()
    {
        return view('mahasiswa.dashboard.detailProject');
    }
}
