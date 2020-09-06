<?php

namespace App\Http\Controllers;

use App\AnggotaProyek;
use App\Dosen;
use App\KelompokProyek;
use App\Mahasiswa;
use App\MahasiswaProyek;
use App\Periode;
use App\Laporan;
use App\Proyek;
use App\KelasProyek;
use App\ProyekPilihan;
use App\UsulMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KelompokProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('admin')->check()) {

            $kelasperiode = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('kelasproyek.status', '=', 'Aktif')
                                    ->where('kelompokproyek.statusKelompok', '=', 'Aktif')
                                    ->orWhere('kelompokproyek.statusKelompok', '=', 'Menunggu Persetujuan')
                                    ->select('kelasproyek.id_kelasProyek', 'kelasproyek.namaKelasProyek', 
                                            'kelasproyek.status as statusKelasProyek'
                                            ,'periode.id_periode', 'periode.tahunAjaran', 'periode.semester')
                                    ->orderBy('id_kelompokProyek', 'desc')
                                    ->distinct()
                                    ->getQuery()
                                    ->get();

            return view('admin.kelompok.index')->with('kelasperiode', $kelasperiode);

        }

        else{

            return view('errors.403');

        }
    } 

    public function indexDosen()
    {
        //
        if(Auth::guard('dosen')->check()) {        
        $id = Auth::guard('dosen')->user()->id_dosen;

        $kelasperiode = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                            ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                            ->join('periode', 'periode_id', '=', 'id_periode')
                                            ->where('statusKelompok', '=', 'Aktif')
                                            ->where('dosen_id', '=', $id)
                                            ->select('kelasproyek.id_kelasProyek', 'kelasproyek.namaKelasProyek', 
                                                      'kelasproyek.status as statusKelasProyek'
                                                    , 'periode.id_periode', 'periode.tahunAjaran', 'periode.semester')
                                            ->distinct()
                                            ->orderBy('id_kelasProyek', 'desc')
                                            ->getQuery()
                                            ->get();
            
            return view('dosen.kelompokbimbingan.index')->with('kelasperiode', $kelasperiode);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexKelompok($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check()) {

            $exist = KelasProyek::findOrFail($idkel);
            $exist2 = Periode::findOrFail($idper);

            $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('kelasProyek_id', '=', $idkel)
                                    ->where('periode_id', '=', $idper)
                                    ->where('statusKelompok', '=', 'Menunggu Persetujuan')
                                    ->select('kelompokproyek.*','kelasproyek.namaKelasProyek'
                                            ,'periode.tahunAjaran', 'periode.semester')
                                    ->getQuery()
                                    ->get();
            

                $dosen = Dosen::all();
                $id_kls = $idkel;
                $id_per = $idper;

                return view('admin.kelompok.indexKelompok')->with('kelompok', $kelompok)
                                                            ->with('id_kls', $id_kls)
                                                            ->with('id_per', $idper)
                                                            ->with('dosen', $dosen);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexKelompokAktif($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check()) {

            $exist = KelasProyek::findOrFail($idkel);
            $exist2 = Periode::findOrFail($idper);

            $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('kelasProyek_id', '=', $idkel)
                                    ->where('periode_id', '=', $idper)
                                    ->where('statusKelompok', '=', 'Aktif')
                                    ->select('kelompokproyek.*','kelasproyek.namaKelasProyek'
                                            ,'periode.tahunAjaran', 'periode.semester')
                                    ->getQuery()
                                    ->get();
                                    
                $dosen = Dosen::all();
                $id_kls = $idkel;
                $id_per = $idper;


                return view('admin.kelompok.indexKelompokAktif')->with('kelompok', $kelompok)
                                                            ->with('id_kls', $id_kls)
                                                            ->with('id_per', $idper)
                                                            ->with('dosen', $dosen);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexKelompokNonAktif($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check()) {

            $exist = KelasProyek::findOrFail($idkel);
            $exist2 = Periode::findOrFail($idper);

            $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('kelasProyek_id', '=', $idkel)
                                    ->where('periode_id', '=', $idper)
                                    ->where('statusKelompok', '=', 'Non Aktif')
                                    ->select('kelompokproyek.*','kelasproyek.namaKelasProyek'
                                            ,'periode.tahunAjaran', 'periode.semester')
                                    ->getQuery()
                                    ->get();

                $dosen = Dosen::all();
                $id_kls = $idkel;
                $id_per = $idper;

                return view('admin.kelompok.indexKelompokNonAktif')->with('kelompok', $kelompok)
                                                            ->with('id_kls', $id_kls)
                                                            ->with('id_per', $idper)
                                                            ->with('dosen', $dosen);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexKelompokDosen($idkel, $idper)
    {
        //
        if(Auth::guard('dosen')->check()) {

            $id = Auth::guard('dosen')->user()->id_dosen;

            $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('kelasProyek_id', '=', $idkel)
                                    ->where('periode_id', '=', $idper)
                                    ->where('dosen_id', '=', $id)
                                    ->select('kelompokproyek.*','kelasproyek.namaKelasProyek'
                                            ,'periode.tahunAjaran', 'periode.semester')
                                    ->getQuery()
                                    ->get();
            
            if(count($kelompok) < 1){
                return view('errors.404');
            }
            else{
                $dosen = Dosen::all();
                return view('dosen.kelompokbimbingan.indexKelompok')->with('dosen', $dosen)
                                                                ->with('kelompok', $kelompok);
            }

        }

        else{
            return view('errors.403');
        }
    }

    public function indexMahasiswa()
    {   
        if(Auth::guard('mahasiswa')->check()) {

            $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;
            $Mpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->where('mahasiswa_id', '=', $id)
                                    ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 'kelasproyek.namaKelasProyek')
                                    ->getQuery()
                                    ->get();
            $idMpro = array();
            foreach ($Mpro as $mpro)
                $idMpro[] = $mpro->id_mahasiswaProyek;

            $mProKelompok = AnggotaProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                        ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                        ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                        ->where('mahasiswa_id', '=', $id)
                                        ->where('statusAnggota', '=', 'Aktif')
                                        ->select('mahasiswaproyek.id_mahasiswaProyek')
                                        ->getQuery()
                                        ->get();
            $idMproKelompok = array();
            foreach ($mProKelompok as $mProKel)
                $idMproKelompok[] = $mProKel->id_mahasiswaProyek;


            $mpro_diff = array_diff($idMpro, $idMproKelompok);

            if($mpro_diff != null){
            $kelpro = MahasiswaProyek::join('kelasProyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->whereIn('id_mahasiswaProyek',  $mpro_diff )
                                    ->where('kelasproyek.status', '=', 'Pendaftaran')
                                    ->select('periode.semester','periode.tahunAjaran','kelasproyek.namaKelasProyek','kelasproyek.status', 
                                            'mahasiswaproyek.id_mahasiswaProyek')
                                    ->getQuery()
                                    ->get();
            }
            else{
                $kelpro = null;
            }
            $kelompok = AnggotaProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                        ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                        ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                        ->where('mahasiswa_id', '=', $id)
                                        ->where('anggotakelompok.statusAnggota', '=', 'Aktif')
                                        ->select('kelompokproyek.*', 'mahasiswaproyek.*','anggotakelompok.*')
                                        ->getQuery()
                                        ->get();


            $kelasproyek = KelasProyek::all();
            $periode = Periode::all();
            $dosen = Dosen::all();
            $mahasiswa = Mahasiswa::all();

            return view('mahasiswa.proyek.index') ->with('kelompok', $kelompok)
                                                        ->with('kelasproyek', $kelasproyek)
                                                        ->with('periode', $periode)
                                                        ->with('dosen', $dosen)
                                                        ->with('kelpro', $kelpro)
                                                        ->with('mahasiswa', $mahasiswa);

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
        if(Auth::guard('mahasiswa')->check()) {
            // dd($request);

            $this->validate($request, [
                'mahasiswaProyek_id' => 'required',
                'pm' => 'required',
                'judulPrioritas' => 'required',
                'statusKelompok' => 'required',
            ]);
            
            $kelompok = new KelompokProyek([
                'mahasiswaProyek_id'    => $request->get('mahasiswaProyek_id'),
                'pm'                    => $request->get('pm'),
                'judulPrioritas'        => $request->get('judulPrioritas'),
                'statusKelompok'        => $request->get('statusKelompok')
            ]);
            $kelompok->save();

            $anggota = new AnggotaProyek([
                'kelompokProyek_id'     => $kelompok->id_kelompokProyek,
                'mahasiswaProyek_id'    => $kelompok->mahasiswaProyek_id,
                'statusAnggota'         => 'Aktif'
            ]);
            $anggota->save();

            return back()->with('success', 'Berhasil membentuk kelompok');

        }

        else{
            return view('errors.403');
        }
    }
    

    public function showAdmin($id)
    {
        if(Auth::guard('admin')->check()) {

        $exist = KelompokProyek::findOrFail($id);

        $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->select('kelompokproyek.*', 'kelasproyek.namaKelasProyek', 'kelasproyek.id_kelasProyek',
                                            'periode.tahunAjaran', 'periode.semester', 'periode.id_periode')
                                    ->where('kelompokproyek.id_kelompokProyek', '=', $id )
                                    ->getQuery()
                                    ->get();

        $anggota = AnggotaProyek::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->where('kelompokProyek_id', '=', $id)
                                ->select('namaMahasiswa', 'nim' ,'id_kelompokProyek', 'id_mahasiswaProyek', 'id_anggotaKelompok', 'statusAnggota')
                                ->getQuery()
                                ->get();

        $judulPilihan = ProyekPilihan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->join('proyek', 'proyek_id', '=', 'id_proyek')
                                    ->where('kelompokProyek_id', '=', $id)
                                    ->select('judul', 'deskripsi', 'prioritas', 'id_proyek', 'id_proyekPilihan', 'id_kelompokProyek', 'judulPrioritas', 'statusProyek')
                                    ->orderBy('prioritas')
                                    ->getQuery()
                                    ->get();

        $usul = UsulMahasiswa::join('kelompokproyek', 'id_kelompokProyek', '=', 'kelompokProyek_id')
                            ->join('mahasiswaproyek', 'mahasiswaproyek_id', '=', 'id_mahasiswaproyek')
                            ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                            ->join('periode', 'periode_id', '=', 'id_periode')
                            ->where('kelompokProyek_id', '=', $id)
                            ->select('id_kelompokProyek', 'id_usulMahasiswa', 'judulUsul', 'usulmahasiswa.deskripsi as usDesk', 
                                        'statusUsul', 'judulPrioritas', 'id_periode', 'id_kelasProyek')
                            ->getQuery()
                            ->get();

        $ambiljudul = KelompokProyek::where('id_kelompokProyek', '=', $id)
                                    ->select('judulPrioritas')
                                    ->getQuery()
                                    ->get();
        $kelpro = array();
        foreach($kelompok as $kel){
            $kelpro = $kel->id_kelasProyek;
        }

        $per = array();
        foreach($kelompok as $kel){
            $per = $kel->id_periode;
        }

        $judulProyek = Proyek::where('statusProyek', '!=', "Aktif")
                                ->where('statusProyek', '!=', "Selesai")
                                ->where('kelasProyek_id', '=', $kelpro)
                                ->where('periode_id', '=', $per)
                                ->select('id_proyek', 'judul')
                                ->getQuery()
                                ->get();

        $dosen = Dosen::all();

        return view('admin.kelompok.show')->with('kelompok', $kelompok)
                                        ->with('anggota', $anggota)
                                        ->with('usul', $usul)
                                        ->with('dosen', $dosen)
                                        ->with('judulProyek', $judulProyek)
                                        ->with('ambiljudul', $ambiljudul)
                                        ->with('judulPilihan', $judulPilihan);
            
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
    public function showKelompokDosen($id)
    {
        
        if(Auth::guard('dosen')->check()) {

            $ids = Auth::guard('dosen')->user()->id_dosen;
            $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                        ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                        ->join('periode', 'periode_id', '=', 'id_periode')
                                        ->join('dosen', 'dosen_id', 'id_dosen')
                                        ->select('kelompokproyek.*', 'kelasproyek.namaKelasProyek', 'kelasproyek.id_kelasProyek',
                                                'periode.tahunAjaran', 'periode.semester', 'periode.id_periode')
                                        ->where('kelompokproyek.id_kelompokProyek', '=', $id )
                                        ->where('dosen_id', '=', $ids)
                                        ->getQuery()
                                        ->get();
            if(count($kelompok) < 1){
                return view('errors.404');
            }
            else{
                $anggota = AnggotaProyek::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                        ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                        ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                        ->where('kelompokProyek_id', '=', $id)
                                        ->select('namaMahasiswa', 'nim' ,'id_kelompokProyek', 'id_mahasiswaProyek', 'id_anggotaKelompok', 'statusAnggota')
                                        ->getQuery()
                                        ->get();
                $judulPilihan = ProyekPilihan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                            ->join('proyek', 'proyek_id', '=', 'id_proyek')
                                            ->where('kelompokProyek_id', '=', $id)
                                            ->select('judul', 'deskripsi', 'prioritas', 'id_proyek', 'id_proyekPilihan', 'id_kelompokProyek', 'judulPrioritas')
                                            ->orderBy('prioritas')
                                            ->getQuery()
                                            ->get();
                $usul = UsulMahasiswa::join('kelompokproyek', 'id_kelompokProyek', '=', 'kelompokProyek_id')
                                    ->join('mahasiswaproyek', 'mahasiswaproyek_id', '=', 'id_mahasiswaproyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('kelompokProyek_id', '=', $id)
                                    ->select('id_kelompokProyek', 'id_usulMahasiswa', 'judulUsul', 'usulmahasiswa.deskripsi as usDesk', 
                                                'statusUsul', 'judulPrioritas', 'id_periode', 'id_kelasProyek')
                                    ->getQuery()
                                    ->get();

                $ambiljudul = KelompokProyek::where('id_kelompokProyek', '=', $id)
                                            ->select('judulPrioritas')
                                            ->getQuery()
                                            ->get();
                $kelpro = array();
                foreach($kelompok as $kel){
                    $kelpro = $kel->id_kelasProyek;
                }
                $per = array();
                foreach($kelompok as $kel){
                    $per = $kel->id_periode;
                }
                $judulProyek = Proyek::where('statusProyek', '!=', "Aktif")
                                        ->where('kelasProyek_id', '=', $kelpro)
                                        ->where('periode_id', '=', $per)
                                        ->select('id_proyek', 'judul')
                                        ->getQuery()
                                        ->get();
                $dosen = Dosen::all();

                $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('kelompokProyek_id', '=', $id)
                                    ->select('laporan.*')
                                    ->limit(3)
                                    ->orderBy('id_laporan', 'desc')
                                    ->getQuery()
                                    ->get();

                return view('dosen.kelompokbimbingan.detailKelompok')->with('kelompok', $kelompok)
                                          ->with('anggota', $anggota)
                                          ->with('usul', $usul)
                                          ->with('dosen', $dosen)
                                          ->with('judulProyek', $judulProyek)
                                          ->with('ambiljudul', $ambiljudul)
                                          ->with('judulPilihan', $judulPilihan)
                                          ->with('laporan', $laporan);
            }
        }

        else{

            return view('errors.403');

        }
    }

    public function showMahasiswa($id)
    {
        //

        if(Auth::guard('mahasiswa')->check()) {

        $ids = Auth::guard('mahasiswa')->user()->id_mahasiswa;
        $kelompok = AnggotaProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                    ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                    ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('mahasiswa_id', '=', $ids)
                                    ->where('id_kelompokProyek', '=', $id)
                                    ->select('kelompokproyek.*', 'mahasiswaproyek.*','anggotakelompok.*', 
                                            'kelompokproyek.mahasiswaProyek_id as mProKelompok', 
                                            'kelasproyek.status as statusKelasProyek'
                                            , 'kelasproyek.namaKelasProyek')
                                    ->getQuery()
                                    ->get();
            if(count($kelompok) < 1){
                return view('errors.404');
            }
            else{
                $kelasproyek = KelasProyek::all();
                $periode = Periode::all();
                $dosen = Dosen::all();
                $mahasiswa = Mahasiswa::all();

                $klsproid = array();
                $proid    = array();
                foreach ($kelompok as $kelompoks)
                    $klsproid[] = $kelompoks->kelasProyek_id;
                foreach ($kelompok as $periodes)
                    $proid[] = $periodes->periode_id;

                $anggota = MahasiswaProyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                ->join('periode', 'periode_id', '=', 'id_periode')
                ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                ->where('kelasProyek_id', '=', $klsproid)
                ->where('periode_id', '=', $proid)
                ->select('mahasiswaproyek.*', 'mahasiswa.namaMahasiswa', 'mahasiswa.nim')
                ->getQuery()
                ->get();

                $anggotaKelompok = AnggotaProyek::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'mahasiswaproyek.id_mahasiswaProyek')
                ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                ->where('kelompokProyek_id', '=', $id)
                ->select('mahasiswa.namaMahasiswa', 'mahasiswa.nim', 'anggotakelompok.statusAnggota', 'anggotakelompok.id_anggotaKelompok')
                ->getQuery()
                ->get();

                $jumAnggota = AnggotaProyek::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                            ->where('kelompokProyek_id', '=', $id)
                                            ->count('anggotakelompok.id_anggotaKelompok');

                $maksAnggota = KelasProyek::where('id_kelasProyek', '=', $klsproid)
                                            ->select('kelasproyek.maksAnggota')
                                            ->getQuery()
                                            ->get();

                $judul = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                ->join('periode', 'periode_id', '=', 'id_periode')
                ->where('kelasProyek_id', '=', $klsproid)
                ->where('periode_id', '=', $proid)
                ->where('proyek.statusProyek', '=', 'Belum Diambil')
                ->select('proyek.*')
                ->getQuery()
                ->get();

                $judulPilihan = ProyekPilihan::join('kelompokProyek', 'kelompokProyek_id' ,'=', 'id_kelompokProyek')
                                                ->join('proyek', 'proyek_id', '=', 'id_proyek')
                                                ->where('kelompokProyek_id', '=', $id)
                                                ->select('kelompokProyek.*', 'proyek.*', 'proyekpilihan.*')
                                                ->getQuery()
                                                ->get();
                
                $jumlahPilihan = ProyekPilihan::join('kelompokProyek', 'kelompokProyek_id' ,'=', 'id_kelompokProyek')
                                                ->join('proyek', 'proyek_id', '=', 'id_proyek')
                                                ->where('kelompokProyek_id', '=', $id)
                                                ->count();
                
                $usul = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                        ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                        ->where('kelompokProyek_id', '=', $id)
                                        ->getQuery()
                                        ->get();
                
                $jumUsul = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->where('kelompokProyek_id', '=', $id)
                                    ->count();

                $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('kelompokProyek_id', '=', $id)
                                    ->select('laporan.*')
                                    ->limit(3)
                                    ->orderBy('id_laporan', 'desc')
                                    ->getQuery()
                                    ->get();

                return view('mahasiswa.proyek.show') ->with('kelompok', $kelompok)
                                                        ->with('kelasproyek', $kelasproyek)
                                                        ->with('periode', $periode)
                                                        ->with('dosen', $dosen)
                                                        ->with('anggota', $anggota)
                                                        ->with('mahasiswa', $mahasiswa)
                                                        ->with('jumAnggota', $jumAnggota)
                                                        ->with('maksAnggota', $maksAnggota)
                                                        ->with('anggotaKelompok', $anggotaKelompok)
                                                        ->with('judul', $judul)
                                                        ->with('judulPilihan', $judulPilihan)
                                                        ->with('jumlahPilihan', $jumlahPilihan)
                                                        ->with('usul', $usul)
                                                        ->with('laporan', $laporan)
                                                        ->with('jumUsul', $jumUsul);
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
    public function update(Request $request)
    {
        //
        $judulprio = Proyek::where('judul', '=', $request->judulPrioritas)
                                ->select('id_proyek', 'judul')
                                ->getQuery()
                                ->get();

        if(count($judulprio) > 0){
            $judprio = array();
            foreach ($judulprio as $jupil)
                $judprio[] = $jupil->id_proyek;
        }
        else{
            $judprio = 0;
        }
        
    
        $judulusul = Proyek::where('judul', '=', $request->judulUsul)
            ->select('id_proyek', 'judul')
            ->getQuery()
            ->get();

        $judusul = array();
        foreach ($judulusul as $jupil2)
            $judusul[] = $jupil2->id_proyek;


        $judulpil = Proyek::where('id_proyek', '=', $request->id_proyek)
            ->select('judul')
            ->getQuery()
            ->get();

        $judulpriobaru = array();
        foreach ($judulpil as $jupil3)
            $judulpriobaru[] = $jupil3->judul;

        if($request->setujuiUsul == "ya"){
            $usul                    = UsulMahasiswa::findOrFail($request->id_usulMahasiswa);
            $usul->statusUsul        = "Diterima";
            $usul->save();

            if($judprio != 0){
            $proyeklama              = Proyek::findOrFail($judprio[0]);
                $proyeklama->statusProyek      = "Belum Diambil";
                $proyeklama->save();
            }

            $pro = new Proyek([
                'usulMahasiswa_id'      => $request->id_usulMahasiswa,
                'judul'                 => $request->judulUsul,
                'deskripsi'             => $request->deskripsi,
                'kelasProyek_id'        => $request->id_kelasProyek,
                'periode_id'            => $request->id_periode,
                'statusProyek'          => 'Aktif'
    
            ]);
            $pro->save();

            $proakhir                    = KelompokProyek::findOrFail($request->id_kelompokProyek);
            $proakhir->judulPrioritas    = $request->judulUsul;
            $proakhir->save();
        }

        elseif($request->pilihlain == "ya"){

            if($judprio != 0){
            $proyeklama              = Proyek::findOrFail($judprio[0]);
            $proyeklama->statusProyek      = "Belum Diambil";
            $proyeklama->save();
            }

            $proyekbaru              = Proyek::findOrFail($request->id_proyek);
            $proyekbaru->statusProyek      = "Aktif";
            $proyekbaru->save();
            
            $kelompok                 = KelompokProyek::findOrFail($request->id_kelompokProyek);
            $kelompok->judulPrioritas = $judulpriobaru[0];
            $kelompok->save();
            
        }

        elseif($request->dosen == "ya"){
            
            $kelompok                 = KelompokProyek::findOrFail($request->id_kelompokProyek);
            $kelompok->statusKelompok = $request->statusKelompok;
            $kelompok->dosen_id       = $request->dosen_id;
            $kelompok->save();
        }
        
        else{
            if($request->id_proyek != NULL){

                if($judprio != 0){
                $proyeklama              = Proyek::findOrFail($judprio[0]);
                $proyeklama->statusProyek      = "Belum Diambil";
                $proyeklama->save();
                }
    
                $proyekbaru              = Proyek::findOrFail($request->id_proyek);
                $proyekbaru->statusProyek      = "Aktif";
                $proyekbaru->save();
                
                $kelompok                 = KelompokProyek::findOrFail($request->id_kelompokProyek);
                $kelompok->judulPrioritas = $request->judul;
                $kelompok->save();      
            }
    
            elseif($request->id_usulMahasiswa != NULL){

                if($judprio != 0){
                $proyeklama                    = Proyek::findOrFail($judprio[0]);
                $proyeklama->statusProyek      = "Belum Diambil";
                $proyeklama->save();
                }
                
                $proyekbaru                    = Proyek::findOrFail($judusul[0]);
                $proyekbaru->statusProyek      = "Aktif";
                $proyekbaru->save();

                $kelompok                 = KelompokProyek::findOrFail($request->id_kelompokProyek);
                $kelompok->judulPrioritas = $request->judulUsul;
                $kelompok->save(); 
            }
        }
        

        return back()->with('success', 'Berhasil mengubah data kelompok');

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
        $kelompok = KelompokProyek::findOrFail($id);
        $kelompok->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
