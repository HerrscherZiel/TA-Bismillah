<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\KelasProyek;
use App\Periode;
use App\Proyek;
use App\UsulMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proyek = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
//            ->join('usulMahasiswa', 'usulMahasiswa', '=', 'id_periode')
            ->select('proyek.*', 'kelasProyek.*', 'periode.*', 'proyek.deskripsi as desProyek')
            ->getQuery()
            ->get();

        $penambah = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')    
                                    ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                    ->select('mahasiswa.namaMahasiswa', 'usulmahasiswa.id_usulMahasiswa')
                                    ->getQuery()
                                    ->get();

        // dd($penambah);    

        // $usulMhs = UsulMahasiswa::all();
        $dosen   = Dosen::all();
        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();


//        dd($proyek);


        return view('admin.proyek.index') ->with('proyek', $proyek)
                                                ->with('penambah', $penambah)
                                                // ->with('usulMhs', $usulMhs)
                                                ->with('dosen', $dosen)
                                                ->with('kelasproyek', $kelasproyek)
                                                ->with('periode', $periode);


    }

    public function indexDosen()
    {

        $id = Auth::guard('dosen')->user()->id_dosen;

//        dd($id);

        $proyekDosen = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->join('dosen', 'dosen_id', '=', 'id_dosen')
            ->where('dosen_id', '=', $id)
//            ->join('usulMahasiswa', 'usulMahasiswa', '=', 'id_periode')
            ->select('proyek.*', 'kelasProyek.*', 'periode.*', 'dosen.*')
            ->getQuery()
            ->get();

        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('dosen.proyek.index') ->with('proyekDosen', $proyekDosen)
                                                ->with('kelasproyek', $kelasproyek)
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
        //
        Proyek::create($request->all());

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
        $pro = Proyek::findOrFail($request->id_proyek);
        $pro->update($request->all());

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
        $pro = Proyek::findOrFail($id);
        $pro->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }
}
