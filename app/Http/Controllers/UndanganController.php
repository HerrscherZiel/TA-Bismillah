<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AnggotaProyek;
use App\MahasiswaProyek;
use App\ProyekPilihan;
use App\Proyek;
use App\KelasProyek;
use App\Periode;
use App\UsulMahasiswa;
use App\KelompokProyek;


class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('mahasiswa')->check()) {

        $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;
        $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                 ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                 ->where('mahasiswa_id', '=', $id)
                                 ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 
                                        'kelasproyek.namaKelasProyek', 'mahasiswa.namaMahasiswa')
                                 ->getQuery()
                                 ->get();
        $Mpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->select('mahasiswaproyek.id_mahasiswaProyek',  'mahasiswa.namaMahasiswa')
                                ->getQuery()
                                ->get();
        $idmp = array();
        foreach ($idMpro as $mp)
            $idmp[] = $mp->id_mahasiswaProyek;

        $undangan = AnggotaProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
            ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
            ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->whereIn('anggotakelompok.mahasiswaProyek_id', $idmp)
            ->where('anggotakelompok.statusAnggota', '=', 'Menunggu Konfirmasi')
            ->select('mahasiswaproyek.*', 'kelompokproyek.*', 'anggotakelompok.*', 'kelasproyek.*', 'periode.*')
            ->getQuery()
            ->get();

        $propil     = ProyekPilihan::all();
        $proyek     = Proyek::all();
        $anggota   = AnggotaProyek::all();
        $kelasproyek = KelasProyek::all();
        $usul = UsulMahasiswa::all();
        $periode = Periode::all();
        $kelompokproyek = KelompokProyek::all();

        return view('mahasiswa.undangan.index') ->with('undangan', $undangan)
                                                ->with('propil', $propil)
                                                ->with('Mpro', $Mpro)
                                                ->with('proyek', $proyek)
                                                ->with('usul', $usul)
                                                ->with('anggota', $anggota)
                                                ->with('kelasproyek', $kelasproyek)
                                                ->with('kelompokproyek', $kelompokproyek)
                                                ->with('periode', $periode);
        }

        else{
            return view('errors.403');
        }


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

        if(Auth::guard('mahasiswa')->check()) {

            $ids = Auth::guard('mahasiswa')->user()->id_mahasiswa;
            $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->where('mahasiswa_id', '=', $ids)
                                    ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 
                                    'kelasproyek.namaKelasProyek', 'mahasiswa.namaMahasiswa')
                                    ->getQuery()
                                    ->get();
            $idmp = array();
            foreach ($idMpro as $a)
                $idmp[] = $a->id_mahasiswaProyek;

            $undangan = KelompokProyek::join('anggotakelompok', 'kelompokproyek.id_kelompokProyek', '=', 'anggotakelompok.kelompokProyek_id')
                ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                ->join('periode', 'periode_id', '=', 'id_periode')
                ->whereIn('anggotakelompok.mahasiswaProyek_id', $idmp)
                ->where('anggotakelompok.statusAnggota', '=', 'Menunggu Konfirmasi')
                ->where('kelompokproyek.id_kelompokProyek', '=', $id)
                ->select('mahasiswaproyek.*', 'kelompokproyek.*', 'anggotakelompok.*', 
                        'kelasproyek.*', 'periode.*')
                ->getQuery()
                ->get();
            if(count($undangan) < 1){
                return view('errors.404');
            }
            else{
                $Mpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                ->select('mahasiswaproyek.id_mahasiswaProyek',  'mahasiswa.namaMahasiswa')
                ->getQuery()
                ->get();
                
                $usul = UsulMahasiswa::join('kelompokproyek', 'id_kelompokProyek', '=', 'kelompokProyek_id')
                                    ->where('kelompokproyek.id_kelompokProyek', '=', $id)
                                    ->select('usulmahasiswa.*')
                                    ->getQuery()
                                    ->get();
                $angg = AnggotaProyek::join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                        ->join('kelompokproyek', 'id_kelompokProyek', '=', 'kelompokProyek_id')
                                        ->where('kelompokproyek.id_kelompokProyek', '=', $id)
                                        ->where('anggotakelompok.statusAnggota', '=', 'Aktif')
                                        ->count();
                $pro = ProyekPilihan::join('kelompokproyek', 'id_kelompokProyek', '=', 'kelompokProyek_id')
                            ->where('kelompokproyek.id_kelompokProyek', '=', $id)
                            ->count();

                $propil     = ProyekPilihan::all();
                $proyek     = Proyek::all();
                $anggota   = AnggotaProyek::all();
                $kelompokproyek = KelompokProyek::all();

                return view('mahasiswa.undangan.show') ->with('undangan', $undangan)
                                                        ->with('propil', $propil)
                                                        ->with('Mpro', $Mpro)
                                                        ->with('proyek', $proyek)
                                                        ->with('angg', $angg)
                                                        ->with('pro', $pro)
                                                        ->with('usul', $usul)
                                                        ->with('anggota', $anggota)
                                                        ->with('kelompokproyek', $kelompokproyek);
            }
        }

        else{
            return view('errors.403');
        }

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
