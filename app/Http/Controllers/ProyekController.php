<?php

namespace App\Http\Controllers;

use App\KelasProyek;
use App\Periode;
use App\Proyek;
use App\UsulMahasiswa;
use Illuminate\Http\Request;

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
            ->select('proyek.*', 'kelasProyek.*', 'periode.*'/*, 'usulmahasiswa.*'*/)
            ->getQuery()
            ->get();

        $usulMhs = UsulMahasiswa::all();
        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();


//        dd($proyek);


        return view('admin.proyek.index') ->with('proyek', $proyek)
                                                ->with('usulmahasiswa', $usulMhs)
                                                ->with('kelasproyek', $kelasproyek)
                                                ->with('periode', $periode);


    }

    public function indexDosen()
    {
        return view('dosen.proyek.index');
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
    }
}
