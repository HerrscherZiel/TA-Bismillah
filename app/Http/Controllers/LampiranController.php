<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Laporan;
use App\MahasiswaProyek;
use App\Proyek;
use App\KelompokProyek;
use App\Lampiran;

class LampiranController extends Controller
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
        $this->validate($request, [
            'lampiran' => 'required',
            'fileLampiran' => 'required | mimes:jpeg,png,jpg | max:5000',
            ]);
        $lamp = new Lampiran;

        $file = $request->file('fileLampiran');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_upload';
        $file->move($tujuan_upload, $nama_file);
        $lamp->fileLampiran = $nama_file;

        $lamp->lampiran = $request->lampiran;
        $lamp->laporan_id = $request->laporan_id;
        $lamp->save();
        return back()->with('success', 'Berhasil menambah lampiran');
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
        $lamp = Lampiran::findOrFail($id);
        $lamp->delete();

        return back()->with('success', 'Berhasil menghapus lampiran');
    }
}
