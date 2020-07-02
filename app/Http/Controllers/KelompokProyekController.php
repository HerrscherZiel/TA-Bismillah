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

            return view('admin.kelompok.index')->with('kelasperiode', $kelasperiode);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexKelompok($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check()) {

            // dd($idkel);

            $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('kelasProyek_id', '=', $idkel)
                                    ->where('periode_id', '=', $idper)
                                    // ->whereIn('id_mahasiswaProyek', $b)
                                    ->select('kelompokproyek.*','kelasproyek.namaKelasProyek'
                                            ,'periode.tahunAjaran', 'periode.semester')
                                    ->getQuery()
                                    ->get();
            
            // dd($kelompok);

            return view('admin.kelompok.indexKelompok')->with('kelompok', $kelompok);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexMahasiswa()

    {
        //
        $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;

//        dd($id);
        //ambil id mahasiswa ke mhsproyek
        $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                 ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                 ->where('mahasiswa_id', '=', $id)
                                 ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 'kelasproyek.namaKelasProyek')
                                 ->getQuery()
                                 ->get();

        $b = array();

        foreach ($idMpro as $a)
            $b[] = $a->id_mahasiswaProyek;

    //semua id mpro user
    //    dd($b); 

        //mencari mpro yang sudah ada pada kelompok
        $exc = AnggotaProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                    ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('mahasiswa_id', '=', $id)
                                    ->select('mahasiswaproyek.id_mahasiswaProyek')
                                    ->getQuery()
                                    ->get();
        // dd($exc);

        // $cek = 

        $z = array();

        foreach ($exc as $x)
            $z[] = $x->id_mahasiswaProyek;

            // dd($z);

        //ambil yang berbeda dari b dikurang z
        $result = array_diff($b, $z);

    //    dd($result);

        if($result != null){
        $excs = MahasiswaProyek::join('kelasProyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                ->whereIn('id_mahasiswaProyek',  $result )
                                ->where('kelasproyek.status', '=', 'Pendaftaran')
                                ->select('kelasproyek.namaKelasProyek','kelasproyek.status', 'mahasiswaproyek.id_mahasiswaProyek')
                                ->getQuery()
                                ->get();
                                // dd($excs);

        }

        else{
            $excs = null;
        }
    //    dd($excs);

        //query for all
        $kelompok = AnggotaProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                    ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('mahasiswa_id', '=', $id)
                                    ->where('anggotakelompok.statusAnggota', '=', 'Aktif')
                                    // ->whereIn('id_mahasiswaProyek', $b)
                                    ->select('kelompokproyek.*', 'mahasiswaproyek.*','anggotakelompok.*')
                                    ->getQuery()
                                    ->get();

        // dd($kelompok);

        //query for pm
        // $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
        //                             ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
        //                             ->where('mahasiswa_id', '=', $id)
        //                             ->select('kelompokproyek.*', 'mahasiswaproyek.*'/*, 'dosen.*'*/)
        //                             ->getQuery()
        //                             ->get();

        // dd($kelompok);

        // //masuk if
        // $kel = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
        //                         ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
        //                         ->where('mahasiswa_id', '=', $id)
        //                         ->count();
        
        // //query for member
        // if($kel == null){
        // $kelompokMember = AnggotaProyek::join('kelompokproyek', 'kelompokproyek_id', '=', 'id_kelompokproyek')
        //                                 ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'mahasiswaproyek.id_mahasiswaProyek')
        //                                 ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
        //                                 ->where('mahasiswa_id', '=', $id)
        //                                 ->whereIn('mahasiswaproyek.id_mahasiswaProyek', $result)
        //                                 ->select('kelompokproyek.id_kelompokProyek', 'kelompokproyek.pm', 'kelompokproyek.judulPrioritas',
        //                                         'kelompokproyek.statusKelompok', 'kelompokproyek.dosen_id',
        //                                         'mahasiswaproyek.*'/*, 'dosen.*'*/)
        //                                 ->getQuery()
        //                                 ->get();
            // dd($kelompokMember);
        // }
        // dd($id);


        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();

//        $c = Auth::guard('mahasiswa')->user()->mahasiswaproyek->id_mahasiswaProyek;

//        dd($c);

        return view('mahasiswa.proyek.index') ->with('kelompok', $kelompok)
                                                    // ->with('kelompokMember', $kelompokMember)
                                                    ->with('kelasproyek', $kelasproyek)
                                                    ->with('periode', $periode)
                                                    ->with('dosen', $dosen)
                                                    ->with('excs', $excs)
                                                    ->with('mahasiswa', $mahasiswa);

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
            
            // KelompokProyek::create($request->all());

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

            return back();

        }

        else{
            return view('errors.403');
        }
    }
    

    public function showAdmin($id)
    {
        // //
        // $kelompok = KelompokProyek::findOrFail($id);
        $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->select('kelompokproyek.*', 'kelasproyek.namaKelasProyek', 'kelasproyek.id_kelasProyek',
                                            'periode.tahunAjaran', 'periode.semester', 'periode.id_periode')
                                    ->where('kelompokproyek.id_kelompokProyek', '=', $id )
                                    ->getQuery()
                                    ->get();
        // dd($kelompok);

        $anggota = AnggotaProyek::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                  ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                  ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                  ->where('kelompokProyek_id', '=', $id)
                                  ->select('namaMahasiswa', 'nim' ,'id_kelompokProyek', 'id_mahasiswaProyek', 'id_anggotaKelompok', 'statusAnggota')
                                  ->getQuery()
                                  ->get();

        // dd($anggota);

        $judulPilihan = ProyekPilihan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                       ->join('proyek', 'proyek_id', '=', 'id_proyek')
                                       ->where('kelompokProyek_id', '=', $id)
                                       ->select('judul', 'deskripsi', 'prioritas', 'id_proyek', 'id_proyekPilihan', 'id_kelompokProyek', 'judulPrioritas')
                                       ->orderBy('prioritas')
                                       ->getQuery()
                                       ->get();

        // dd($judulPilihan);

        $usul = UsulMahasiswa::join('kelompokproyek', 'id_kelompokProyek', '=', 'kelompokProyek_id')
                               ->join('mahasiswaproyek', 'mahasiswaproyek_id', '=', 'id_mahasiswaproyek')
                               ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                               ->join('periode', 'periode_id', '=', 'id_periode')
                               ->where('kelompokProyek_id', '=', $id)
                               ->select('id_kelompokProyek', 'id_usulMahasiswa', 'judulUsul', 'usulmahasiswa.deskripsi as usDesk', 
                                        'statusUsul', 'judulPrioritas', 'id_periode', 'id_kelasProyek')
                               ->getQuery()
                               ->get();

        // dd($usul);

        $ambiljudul = KelompokProyek::where('id_kelompokProyek', '=', $id)
                                      ->select('judulPrioritas')
                                      ->getQuery()
                                      ->get();

        // dd($ambiljudul);

        foreach($kelompok as $kel){
            $kelpro = $kel->id_kelasProyek;
        }

        foreach($kelompok as $kel){
            $per = $kel->id_periode;
        }

        // dd($kelpro);

        $judulProyek = Proyek::where('statusProyek', '!=', "Aktif")
                                ->where('kelasProyek_id', '=', $kelpro)
                                ->where('periode_id', '=', $per)
                                ->select('id_proyek', 'judul')
                                ->getQuery()
                                ->get();

        // dd($judulProyek);

        $dosen = Dosen::all();

//        return view('project.show', compact('project', 'module'));
        return view('admin.kelompok.show')->with('kelompok', $kelompok)
                                          ->with('anggota', $anggota)
                                          ->with('usul', $usul)
                                          ->with('dosen', $dosen)
                                          ->with('judulProyek', $judulProyek)
                                          ->with('ambiljudul', $ambiljudul)
                                          ->with('judulPilihan', $judulPilihan);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDosen()
    {
        // //
        // $kelompok = KelompokProyek::findOrFail($id);
        // $anggota = AnggotaKelompok::join('project', 'project_id', '=', 'id_project')
        //     ->select('module.*')
        //     ->where('project.id_project', '=', $id )
        //     ->getQuery()
        //     ->get();

//        return view('project.show', compact('project', 'module'));
        return view('admin.kelompok.show');

    }


    public function showMahasiswa($id)
    {
        //
        $ids = Auth::guard('mahasiswa')->user()->id_mahasiswa;

        //show for all
        $kelompok = AnggotaProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                    ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                    ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('mahasiswa_id', '=', $ids)
                                    ->where('id_kelompokProyek', '=', $id)
                                    ->select('kelompokproyek.*', 'mahasiswaproyek.*','anggotakelompok.*', 
                                            'kelompokproyek.mahasiswaProyek_id as mProKelompok', 'kelasproyek.status as statusKelasProyek'
                                            , 'kelasproyek.namaKelasProyek')
                                    ->getQuery()
                                    ->get();
        
    // dd($kelompok);



        // show for pm
        // $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
        // ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
        // ->where('mahasiswa_id', '=', $ids)
        // ->where('id_kelompokProyek', '=', $id)
        // ->select('kelompokproyek.*', 'mahasiswaproyek.*'/*, 'dosen.*'*/)
        // ->getQuery()
        // ->get();

        // dd($kelompok);


        // //masuk if
        // $kel = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
        // ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
        // ->where('mahasiswa_id', '=', $id)
        // ->count();

        // dd($kel);
        
        // //query for member
        // if($kel == null){
        //     $kelompok = AnggotaProyek::join('kelompokproyek', 'kelompokproyek_id', '=', 'id_kelompokproyek')
        //                                 ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'mahasiswaproyek.id_mahasiswaProyek')
        //                                 ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
        //                                 ->where('mahasiswa_id', '=', $id)
        //                                 ->select('kelompokproyek.id_kelompokProyek', 'kelompokproyek.pm', 'kelompokproyek.judulPrioritas',
        //                                         'kelompokproyek.statusKelompok', 'kelompokproyek.dosen_id',
        //                                         'mahasiswaproyek.*'/*, 'dosen.*'*/)
        //                                 ->getQuery()
        //                                 ->get();
        //     dd($kelompok);
        // }


        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();

        // $mhsproyek = 
        $klsproid = array();
        $proid    = array();

        foreach ($kelompok as $a)
            $klsproid[] = $a->kelasProyek_id;

        foreach ($kelompok as $a)
            $proid[] = $a->periode_id;

            // dd($klsproid);

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

        // dd($maksAnggota);

        $judul = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
        ->join('periode', 'periode_id', '=', 'id_periode')
        ->where('kelasProyek_id', '=', $klsproid)
        ->where('periode_id', '=', $proid)
        ->where('proyek.statusProyek', '=', 'Belum Diambil')
        ->select('proyek.*')
        ->getQuery()
        ->get();

        // dd($judul);

        $judulPilihan = ProyekPilihan::join('kelompokProyek', 'kelompokProyek_id' ,'=', 'id_kelompokProyek')
                                        ->join('proyek', 'proyek_id', '=', 'id_proyek')
                                        ->where('kelompokProyek_id', '=', $id)
                                        ->select('kelompokProyek.*', 'proyek.*', 'proyekpilihan.*')
                                        ->getQuery()
                                        ->get();

        // dd($judulPilihan);
        
        $jumlahPilihan = ProyekPilihan::join('kelompokProyek', 'kelompokProyek_id' ,'=', 'id_kelompokProyek')
                                        ->join('proyek', 'proyek_id', '=', 'id_proyek')
                                        ->where('kelompokProyek_id', '=', $id)
                                        ->count();
        
        // dd($jumlahPilihan);

        $usul = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->where('kelompokProyek_id', '=', $id)
                                ->getQuery()
                                ->get();

        //  dd($usul);
        
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

        // dd($laporan);

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

        $usulpilihan = Proyek::where('judul', '=', $request->judulPrioritas)
                                ->select('id_proyek', 'judul')
                                ->getQuery()
                                ->get();

        foreach ($usulpilihan as $a)
            $pl[] = $a->id_proyek;
        
        $usulpilihan2 = Proyek::where('judul', '=', $request->judulUsul)
            ->select('id_proyek', 'judul')
            ->getQuery()
            ->get();

        foreach ($usulpilihan2 as $b)
            $ul[] = $b->id_proyek;

            

        $judulpil = Proyek::where('id_proyek', '=', $request->id_proyek)
            ->select('judul')
            ->getQuery()
            ->get();

        foreach ($judulpil as $c)
            $ju[] = $c->judul;

        // dd($ju);

        if($request->setujuiUsul == "ya"){
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

            // dd($ju);
            $proyeklama              = Proyek::findOrFail($pl[0]);
            $proyeklama->statusProyek      = "Belum Diambil";
            $proyeklama->save();

            $proyekbaru              = Proyek::findOrFail($request->id_proyek);
            $proyekbaru->statusProyek      = "Aktif";
            $proyekbaru->save();
            
            $kelompok                 = KelompokProyek::findOrFail($request->id_kelompokProyek);
            $kelompok->judulPrioritas = $ju[0];
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
                // $y="1";
                // dd($y);
    
                // dd($request->status);
                $proyeklama              = Proyek::findOrFail($pl[0]);
                $proyeklama->statusProyek      = "Belum Diambil";
                $proyeklama->save();
    
                $proyekbaru              = Proyek::findOrFail($request->id_proyek);
                $proyekbaru->statusProyek      = "Aktif";
                $proyekbaru->save();
                
                $kelompok                 = KelompokProyek::findOrFail($request->id_kelompokProyek);
                $kelompok->judulPrioritas = $request->judul;
                $kelompok->save();      
            }
    
            elseif($request->id_usulMahasiswa != NULL){
    
                // dd($request);
                // $z = "2";
                // dd($z);

                $proyeklama                    = Proyek::findOrFail($pl[0]);
                $proyeklama->statusProyek      = "Belum Diambil";
                $proyeklama->save();
                
                $proyekbaru                    = Proyek::findOrFail($ul[0]);
                $proyekbaru->statusProyek      = "Aktif";
                $proyekbaru->save();

                $kelompok                 = KelompokProyek::findOrFail($request->id_kelompokProyek);
                $kelompok->judulPrioritas = $request->judulUsul;
                $kelompok->save(); 
            }
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
        $kelompok = KelompokProyek::findOrFail($id);
        $kelompok->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }
}
