<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProyekPilihan;
use App\UsulMahasiswa;
use DB;
use App\Proyek;
use App\KelasProyek;
use App\Periode;
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
        if(Auth::guard('admin')->check() || Auth::guard('dosen')->check() ) {

        $kelasperiode = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                ->join('periode', 'periode_id', '=', 'id_periode')
                                ->where('kelasproyek.status', '=', 'Aktif')
                                ->select('kelasProyek_id', 'periode_id', 'namaKelasProyek', 'tahunAjaran', 'semester', DB::raw('count(*) as total'))
                                ->groupBy('kelasProyek_id', 'periode_id', 'namaKelasProyek', 'tahunAjaran', 'semester')
                                ->getQuery()
                                ->get();

        
        return view('admin.usulMahasiswa.index')->with('kelasperiode', $kelasperiode);

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
    public function detail($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check() || Auth::guard('dosen')->check()) {
            $exist = KelasProyek::findOrFail($idkel);
            $exist2 = Periode::findOrFail($idper);

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
                                        'kelompokproyek.id_kelompokProyek', 'kelompokproyek.pm', 'usulmahasiswa.*', 
                                        'kelasproyek.namaKelasProyek','periode.tahunAjaran', 'periode.semester', 
                                        'kelompokproyek.judulPrioritas')
                                ->getQuery()
                                ->get();

        $id_kls = $idkel;
        $id_per = $idper; 


        return view('admin.usulMahasiswa.detail')->with('usul', $usul)
                                                ->with('id_kls', $id_kls)
                                                ->with('id_per', $id_per);      
        }
                                                
        else{
            return view('errors.403');
        }
    }

    public function detailDiterima($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check() || Auth::guard('dosen')->check()) {

            $exist = KelasProyek::findOrFail($idkel);
            $exist2 = Periode::findOrFail($idper);

        $usul = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                ->join('periode', 'periode_id', '=', 'id_periode')
                                ->where('kelasproyek_id', '=', $idkel)
                                ->where('periode_id', '=', $idper)
                                ->where('usulmahasiswa.statusUsul', '=', 'Diterima')
                                ->select('mahasiswa.namaMahasiswa', 'mahasiswa.nim', 'mahasiswaproyek.id_mahasiswaproyek',
                                        'mahasiswaproyek.kelasProyek_id', 'mahasiswaproyek.periode_id', 'kelompokproyek.mahasiswaProyek_id',
                                        'kelompokproyek.id_kelompokProyek', 'kelompokproyek.pm', 'usulmahasiswa.*', 'kelasproyek.namaKelasProyek',
                                        'periode.tahunAjaran', 'periode.semester', 'kelompokproyek.judulPrioritas')
                                ->getQuery()
                                ->get();

                                // dd($usul);
            $id_kls = $idkel;
            $id_per = $idper; 

        return view('admin.usulMahasiswa.detailDisetujui')->with('usul', $usul)
                                                        ->with('id_kls', $id_kls)
                                                        ->with('id_per', $id_per); 
        
        }
        else{
            return view('errors.403');
        }
    }

    public function detailDitolak($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check() || Auth::guard('dosen')->check()) {

            $exist = KelasProyek::findOrFail($idkel);
            $exist2 = Periode::findOrFail($idper);

        $usul = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                ->join('periode', 'periode_id', '=', 'id_periode')
                                ->where('kelasproyek_id', '=', $idkel)
                                ->where('periode_id', '=', $idper)
                                ->where('usulmahasiswa.statusUsul', '=', 'Ditolak')
                                ->select('mahasiswa.namaMahasiswa', 'mahasiswa.nim', 'mahasiswaproyek.id_mahasiswaproyek',
                                        'mahasiswaproyek.kelasProyek_id', 'mahasiswaproyek.periode_id', 'kelompokproyek.mahasiswaProyek_id',
                                        'kelompokproyek.id_kelompokProyek', 'kelompokproyek.pm', 'usulmahasiswa.*', 'kelasproyek.namaKelasProyek',
                                        'periode.tahunAjaran', 'periode.semester', 'kelompokproyek.judulPrioritas')
                                ->getQuery()
                                ->get();


            $id_kls = $idkel;
            $id_per = $idper; 

        return view('admin.usulMahasiswa.detailDitolak')->with('usul', $usul)
                                                        ->with('id_kls', $id_kls)
                                                        ->with('id_per', $id_per);     
                                                        
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
    public function update(Request $request)
    {   

        $judulpilihan = Proyek::where('judul', '=', $request->judulPrioritas)
                                ->select('id_proyek', 'judul')
                                ->getQuery()
                                ->get();


        if($request->status == "tolak"){
            $cekJudul = KelompokProyek::where('id_kelompokProyek', '=', $request->id_kelompokProyek)
                                        ->select('kelompokproyek.*')
                                        ->getQuery()
                                        ->get();

            $judul = array();
            foreach($cekJudul as $cekjud){
                $judul = $cekjud->judulPrioritas;
            }

            if($judul == $request->judulPrioritas) {

                $judulprio = KelompokProyek::findOrFail($request->id_kelompokProyek);
                $judulprio->judulPrioritas        = "Belum ada judul";
                $judulprio->save();
            }

            $usul                    = UsulMahasiswa::findOrFail($request->id_usulMahasiswa);
            $usul->statusUsul        = "Ditolak";
            $usul->save();  
        }

        elseif($request->status == "terima"){
            $usul                    = UsulMahasiswa::findOrFail($request->id_usulMahasiswa);
            $usul->statusUsul        = "Diterima";
            $usul->save();

            $prolama = array();
            foreach ($judulpilihan as $judul){
                $prolama = $judul->id_proyek;
                if($prolama != NULL){
                    $proyeklama              = Proyek::findOrFail($prolama[0]);
                    $proyeklama->statusProyek      = "Belum Diambil";
                    $proyeklama->save();
                }
            }
            $cekproyek = Proyek::where('judul', '=', $request->judulUsul)
                                ->select('id_proyek', 'judul')
                                ->getQuery()
                                ->get();
            if(count($cekproyek) < 1) {
                $pro = new Proyek([
                    'usulMahasiswa_id'      => $request->id_usulMahasiswa,
                    'judul'                 => $request->judulUsul,
                    'deskripsi'             => $request->deskripsi,
                    'kelasProyek_id'        => $request->kelasProyek_id,
                    'periode_id'            => $request->periode_id,
                    'statusProyek'          => 'Aktif'
                ]);
                $pro->save();
            }
            $proakhir                    = KelompokProyek::findOrFail($request->id_kelompokProyek);
            $proakhir->judulPrioritas    = $request->judulUsul;
            $proakhir->save();
        }
        return back()->with('success', 'Berhasil mengubah status usul');
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
