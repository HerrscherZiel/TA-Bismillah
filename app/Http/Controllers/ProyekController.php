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
                                ->select('kelasproyek.id_kelasProyek', 'kelasproyek.namaKelasProyek', 
                                        'kelasproyek.status as statusKelasProyek','periode.id_periode',
                                        'periode.tahunAjaran', 'periode.semester')
                                ->distinct()
                                ->orderBy('id_proyek', 'desc')
                                ->getQuery()
                                ->get();
            $kelasproyek = KelasProyek::all();
            $periode = Periode::all();
            

            return view('admin.proyek.index')->with('kelasperiode', $kelasperiode)
                                             ->with('kelasproyek', $kelasproyek)
                                             ->with('periode', $periode);

        }

        else{
            return view('errors.403');
        }
    } 

    public function indexDetail($idkel, $idper)
    {
        //
        if(Auth::guard('admin')->check()) {

        $exist = KelasProyek::findOrFail($idkel);
        $exist2 = Periode::findOrFail($idper);

        $proyek = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->where('kelasProyek_id', '=', $idkel)
            ->where('periode_id', '=', $idper)
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

            $dosen   = Dosen::all();
            $kelasproyek = KelasProyek::all();
            $periode = Periode::all();

            return view('admin.proyek.indexDetail') ->with('proyek', $proyek)
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
        if(Auth::guard('dosen')->check()) {
        $id = Auth::guard('dosen')->user()->id_dosen;

        $proyekDosen = Proyek::join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->join('dosen', 'dosen_id', '=', 'id_dosen')
            ->where('dosen_id', '=', $id)
            ->where('statusProyek', '=', 'Belum Diambil')
            ->select('proyek.*', 'kelasProyek.*', 'periode.*', 'dosen.*', 'proyek.deskripsi as desPro')
            ->getQuery()
            ->get();

        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('dosen.proyek.index') ->with('proyekDosen', $proyekDosen)
                                            ->with('kelasproyek', $kelasproyek)
                                            ->with('periode', $periode);
        }
        else{
            return view('errors.403');
        }
    }

    public function indexDosenAktif()
    {
        if(Auth::guard('dosen')->check()) {
        $id = Auth::guard('dosen')->user()->id_dosen;

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
        else{
            return view('errors.403');
        }
    }

    public function indexDosenSelesai()
    {
        if(Auth::guard('dosen')->check()) {

        $id = Auth::guard('dosen')->user()->id_dosen;
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

        $rules = [
            'kelasProyek_id' => 'required',
            'periode_id' => 'required',
            'judul' => 'required | unique_with :proyek,kelasProyek_id,periode_id',
            'statusProyek' => 'required'
        ];

        $customMessages = [
            'unique_with' => 'Data yang ditambahkan sudah memiliki data yang sama'
        ];

        $this->validate($request,$rules, $customMessages);
        
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

        $rules = [
            'kelasProyek_id' => 'required',
            'periode_id' => 'required',
            'judul' => 'required',
        ];

        $this->validate($request,$rules);

        $pro = Proyek::findOrFail($request->id_proyek);
        $pro->update($request->all());

        return back()->with('success', 'Berhasil mengubah data');
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
