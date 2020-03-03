<?php

namespace App\Http\Controllers;

use App\KelasProyek;
use App\Mahasiswa;
use App\MahasiswaProyek;
use App\Periode;
use Illuminate\Http\Request;

class MahasiswaProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $mhsProyek = MahasiswaProyek::latest()->paginate(5);
        $mhsProyek = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
            ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->select('mahasiswa.*', 'kelasProyek.*', 'periode.*', 'mahasiswaproyek.*')
            ->orderBy('namaKelasProyek')
            ->getQuery()
            ->get();
//        dd($mhsProyek);

//        $data = MahasiswaProyek::with('proyek', 'periode')->get()

        $mahasiswa = Mahasiswa::all();
        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();


//        dd($mahasiswa);


        return view('admin.mahasiswaproyek.index')->with('mhsProyek', $mhsProyek)
                                                        ->with('mahasiswa', $mahasiswa)
                                                        ->with('kelasProyek', $kelasproyek)
                                                        ->with('periode', $periode);
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
//        Vali
        MahasiswaProyek::create($request->all());

        return back();

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
        $mhsPro = MahasiswaProyek::findOrFail($request->id_mahasiswaProyek);
        $mhsPro->update($request->all());

        return back();
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
        $mhsPro = MahasiswaProyek::findOrFail($id);
        $mhsPro->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }
}
