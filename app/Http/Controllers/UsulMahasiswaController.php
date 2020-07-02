<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProyekPilihan;
use App\UsulMahasiswa;
use App\Proyek;
use App\KelompokProyek;

class UsulMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelasperiode = Proyek::join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                ->join('periode', 'periode_id', '=', 'id_periode')
                                ->where('kelasproyek.status', '=', 'Aktif')
                                ->select('kelasproyek.id_kelasProyek', 'kelasproyek.namaKelasProyek', 'kelasproyek.status as statusKelasProyek'
                                        , 'periode.id_periode', 'periode.tahunAjaran', 'periode.semester')
                                ->distinct()
                                ->getQuery()
                                ->get();
        // dd($kelasperiode);
        
        // dd($usul);
        return view('admin.usulMahasiswa.index')->with('kelasperiode', $kelasperiode);

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
    public function detail($idkel, $idper)
    {
        //
        $usul = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                ->join('periode', 'periode_id', '=', 'id_periode')
                                ->where('kelasproyek_id', '=', $idkel)
                                ->where('periode_id', '=', $idper)
                                ->where('usulmahasiswa.statusUsul', '=', 'Menunggu Persetujuan')
                                ->select('mahasiswa.namaMahasiswa', 'mahasiswa.nim', 'mahasiswaproyek.id_mahasiswaproyek',
                                        'mahasiswaproyek.kelasProyek_id', 'mahasiswaproyek.periode_id', 'kelompokproyek.mahasiswaProyek_id',
                                        'kelompokproyek.id_kelompokProyek', 'kelompokproyek.pm', 'usulmahasiswa.*', 'kelasproyek.namaKelasProyek',
                                        'periode.tahunAjaran', 'periode.semester', 'kelompokproyek.judulPrioritas',)
                                ->getQuery()
                                ->get();

                                // dd($usul);

        return view('admin.usulMahasiswa.detail')->with('usul', $usul);                     
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

        // dd($request);
        $usulpilihan = Proyek::where('judul', '=', $request->judulPrioritas)
                                ->select('id_proyek', 'judul')
                                ->getQuery()
                                ->get();

        foreach ($usulpilihan as $a)
            $pl[] = $a->id_proyek;

        if($request->status == "tolak"){
            // dd($request->status);
            $usul                    = UsulMahasiswa::findOrFail($request->id_usulMahasiswa);
            $usul->statusUsul        = "Ditolak";
            $usul->save();
        }

        elseif($request->status == "terima"){
            $usul                    = UsulMahasiswa::findOrFail($request->id_usulMahasiswa);
            $usul->statusUsul        = "Diterima";
            $usul->save();

            $proyeklama              = Proyek::findOrFail($pl[0]);
            $proyeklama->statusProyek      = "Belum Diambil";
            $proyeklama->save();

            $pro = new Proyek([
                'usulMahasiswa_id'      => $request->id_usulMahasiswa,
                'judul'                 => $request->judulUsul,
                'deskripsi'             => $request->deskripsi,
                'kelasProyek_id'        => $request->kelasProyek_id,
                'periode_id'            => $request->periode_id,
                'statusProyek'          => 'Aktif'
    
            ]);
            $pro->save();

            $proakhir                    = KelompokProyek::findOrFail($request->id_kelompokProyek);
            $proakhir->judulPrioritas    = $request->judulUsul;
            $proakhir->save();
        
        }

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
    }
}
