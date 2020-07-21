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

    public function index(){
        if(Auth::guard('admin')->check()) {

            $kelasperiode = Proyek::join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->select('kelasproyek.id_kelasProyek', 'kelasproyek.namaKelasProyek', 'kelasproyek.status as statusKelasProyek'
                                            , 'periode.id_periode', 'periode.tahunAjaran', 'periode.semester')
                                    ->distinct()
                                    ->orderBy('id_proyek', 'desc')
                                    ->getQuery()
                                    ->get();
            // dd($kelasperiode);
            $kelasproyek = KelasProyek::all();
            $periode = Periode::all();
            
            // dd($usul);

            return view('admin.proyek.index')->with('kelasperiode', $kelasperiode)
                                             ->with('kelasproyek', $kelasproyek)
                                             ->with('periode', $periode);

        }

        else{
            return view('errors.403');
        }
    } 

    public function indexBelumDiambil($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check()) {

        $proyek = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->where('kelasProyek_id', '=', $idkel)
            ->where('periode_id', '=', $idper)
            ->where('statusProyek', '=', 'Belum Diambil')
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
        $id_kls = $idkel;
        $id_per = $idper;    

        // $usulMhs = UsulMahasiswa::all();
        $dosen   = Dosen::all();
        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('admin.proyek.indexBelumDiambil') ->with('proyek', $proyek)
                                                ->with('penambah', $penambah)
                                                ->with('id_kls', $id_kls)
                                                ->with('id_per', $id_per)
                                                ->with('dosen', $dosen)
                                                ->with('kelasproyek', $kelasproyek)
                                                ->with('periode', $periode);

        }

        else{
            return view('errors.403');
        }

    }

    public function indexAktif($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check()) {

        $proyek = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->where('kelasProyek_id', '=', $idkel)
            ->where('periode_id', '=', $idper)
            ->where('statusProyek', '=', 'Aktif')
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

        $id_kls = $idkel;
        $id_per = $idper;  

        // $usulMhs = UsulMahasiswa::all();
        $dosen   = Dosen::all();
        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();


        return view('admin.proyek.indexAktif') ->with('proyek', $proyek)
                                                ->with('penambah', $penambah)
                                                ->with('id_kls', $id_kls)
                                                ->with('id_per', $id_per)                                                
                                                ->with('dosen', $dosen)
                                                ->with('kelasproyek', $kelasproyek)
                                                ->with('periode', $periode);

        }

        else{
            return view('errors.403');
        }

    }

    public function indexSelesai($idkel, $idper)
    {
        //

        if(Auth::guard('admin')->check()) {

        $proyek = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->where('kelasProyek_id', '=', $idkel)
            ->where('periode_id', '=', $idper)
            ->where('statusProyek', '=', 'Selesai')
            ->select('proyek.*', 'kelasProyek.*', 'periode.*', 'proyek.deskripsi as desProyek')
            ->getQuery()
            ->get();

        $penambah = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')    
                                    ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                    ->select('mahasiswa.namaMahasiswa', 'usulmahasiswa.id_usulMahasiswa')
                                    ->getQuery()
                                    ->get();



        $id_kls = $idkel;
        $id_per = $idper;  


        // $usulMhs = UsulMahasiswa::all();
        $dosen   = Dosen::all();
        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('admin.proyek.indexSelesai') ->with('proyek', $proyek)
                                                ->with('penambah', $penambah)
                                                ->with('id_kls', $id_kls)
                                                ->with('id_per', $id_per)                                                
                                                ->with('dosen', $dosen)
                                                ->with('kelasproyek', $kelasproyek)
                                                ->with('periode', $periode);

        }

        else{
            return view('errors.403');
        }

    }

    public function indexDosen()
    {

        $id = Auth::guard('dosen')->user()->id_dosen;

      //        dd($id);

        $proyekDosen = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->join('dosen', 'dosen_id', '=', 'id_dosen')
            ->where('dosen_id', '=', $id)
            ->select('proyek.*', 'kelasProyek.*', 'periode.*', 'dosen.*', 'proyek.deskripsi as desPro')
            ->getQuery()
            ->get();

        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('dosen.proyek.index') ->with('proyekDosen', $proyekDosen)
                                            ->with('kelasproyek', $kelasproyek)
                                            ->with('periode', $periode);
    }

    public function indexDosenAktif()
    {

        $id = Auth::guard('dosen')->user()->id_dosen;

        //        dd($id);

        $proyekDosenAktif = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->join('dosen', 'dosen_id', '=', 'id_dosen')
            ->where('dosen_id', '=', $id)
            ->where('statusProyek', '=', 'Aktif')
            ->select('proyek.*', 'kelasProyek.*', 'periode.*', 'dosen.*','proyek.deskripsi as desPro')
            ->getQuery()
            ->get();

        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('dosen.proyek.indexDosenAktif')->with('proyekDosenAktif', $proyekDosenAktif)
                                        ->with('kelasproyek', $kelasproyek)
                                        ->with('periode', $periode);
    }

    public function indexDosenSelesai()
    {

        $id = Auth::guard('dosen')->user()->id_dosen;

        //        dd($id);

        $proyekDosenSelesai = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->join('dosen', 'dosen_id', '=', 'id_dosen')
            ->where('dosen_id', '=', $id)
            ->where('statusProyek', '=', 'Selesai')
            ->select('proyek.*', 'kelasProyek.*', 'periode.*', 'dosen.*', 'proyek.deskripsi as desPro')
            ->getQuery()
            ->get();

        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('dosen.proyek.indexDosenSelesai')->with('proyekDosenSelesai', $proyekDosenSelesai)
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

        $this->validate($request, [
            'kelasProyek_id' => 'required',
            'periode_id' => 'required',
            'judul' => 'required | unique_with :proyek,kelasProyek_id,periode_id',
            'statusProyek' => 'required'
        ]);
        
        Proyek::create($request->all());

        return back()->with('success', 'Berhasil menambah proyek');
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
            'kelasProyek_id' => 'required',
            'periode_id' => 'required',
            'judul' => 'required | unique_with :proyek,kelasProyek_id,periode_id, ignore:' .$request->id_proyek . ' = id_proyek',
        ]);

        $pro = Proyek::findOrFail($request->id_proyek);
        $pro->update($request->all());

        return back()->with('success', 'Berhasil mengubah data');;
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

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
