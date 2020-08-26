<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Laporan;
use App\MahasiswaProyek;
use App\Proyek;
use App\KelompokProyek;
use App\Dosen;
use App\Pencapaian;

class PencapaianController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mahasiswa.laporan.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa.laporan.addPencapaian');
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

        $this->validate($request, [
            'pencapaian' => 'required',
            'deskripsi' => 'required',
        ]);
        Pencapaian::create($request->all());
        return back()->with('success', 'Berhasil menambah pencapaian');
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
    public function update(Request $request)
    {
        //
        // dd($request);
        $this->validate($request, [
            'pencapaian' => 'required',
            'deskripsi' => 'required',
        ]);
            $pencapaian                    = Pencapaian::findOrFail($request->id_pencapaian);
            $pencapaian->pencapaian             = $request->pencapaian;
            $pencapaian->deskripsi           = $request->deskripsi;
            $pencapaian->save();

            return back()->with('success', 'Berhasil mengubah pencapaian');
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
        $pencapaian = Pencapaian::findOrFail($id);
        $pencapaian->delete();

        return back()->with('success', 'Berhasil menghapus pencapaian');
    }
}
