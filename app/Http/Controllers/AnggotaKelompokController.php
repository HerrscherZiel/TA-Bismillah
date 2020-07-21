<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AnggotaProyek;


class AnggotaKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::guard('mahasiswa')->check()) {

            AnggotaProyek::create($request->all());

            return back();
        }

        else{
            return view('errors.403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request);
        // dd($request->id_anggotaKelompok);
        if($request->id_anggotaKelompok == NULL){
            $anggota                    = AnggotaProyek::findOrFail($id);
            $anggota->statusAnggota = "Aktif";
            $anggota->save();
            }
        else{
            $anggota                    = AnggotaProyek::findOrFail($request->id_anggotaKelompok);
            $anggota->statusAnggota = "Aktif";
            $anggota->save();
        }
        return back();
    }

    public function reject($id)
    {
        //
        // dd($id);
        $anggota = AnggotaProyek::findOrFail($id);
        $anggota->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $anggota = AnggotaProyek::findOrFail($id);
        $anggota->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }
}
