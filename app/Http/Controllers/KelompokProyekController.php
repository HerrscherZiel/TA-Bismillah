<?php

namespace App\Http\Controllers;

use App\AnggotaProyek;
use App\Dosen;
use App\KelompokProyek;
use App\Mahasiswa;
use App\MahasiswaProyek;
use App\Periode;
use App\KelasProyek;
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
        return view('admin.kelompok.index');

    }

    public function indexMahasiswa()

    {
        //
        $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;

//        dd($id);
        $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                 ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                 ->where('mahasiswa_id', '=', $id)
//                                 ->where('mahasiswa_id', '=', $id)
                                 ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 'kelasproyek.namaKelasProyek')
//                                 ->getQuery()
                                 ->get();

        $b = array();

        foreach ($idMpro as $a)
            $b[] = $a->id_mahasiswaProyek;


//        dd($z);

        $exc = MahasiswaProyek::join('kelompokproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
//                                ->where('kelompokproyek.mahasiswaProyek_id', '!=', $b )
                                ->whereIn('kelompokproyek.mahasiswaProyek_id', $b )
//                             ->havingRaw('pm' == $ids )
                                ->select('mahasiswaproyek.id_mahasiswaProyek')
                                ->get();

        $z = array();

        foreach ($exc as $x)
            $z[] = $x->id_mahasiswaProyek;

        $result = array_diff($b, $z);

//        dd($result);

        if($result != null){
        $excs = MahasiswaProyek::join('kelasProyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                ->where('id_mahasiswaProyek', '=' , $result )
                                ->select('kelasproyek.namaKelasProyek', 'mahasiswaproyek.id_mahasiswaProyek')
                                ->get();
        }

        else{
            $excs = null;
        }
//        dd($excs);


        $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                    ->where('mahasiswa_id', '=', $id)
//                                    ->where('mahasiswaProyek_id', '=', $id)
                                    ->select('kelompokproyek.*', 'mahasiswaproyek.*'/*, 'dosen.*'*/)
                                    ->getQuery()
                                    ->get();

//        dd($kelompok);

        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();

//        $c = Auth::guard('mahasiswa')->user()->mahasiswaproyek->id_mahasiswaProyek;

//        dd($c);

        return view('mahasiswa.proyek.index') ->with('kelompok', $kelompok)
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

            KelompokProyek::create($request->all());

            return back();

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
    public function show($id)
    {
        //
        $kelompok = KelompokProyek::findOrFail($id);
        $anggota = \AnggotaKelompok::join('project', 'project_id', '=', 'id_project')
            ->select('module.*')
            ->where('project.id_project', '=', $id )
            ->getQuery()
            ->get();

//        return view('project.show', compact('project', 'module'));
        return view('admin.kelompok.show');

    }


    public function showMahasiswa(/*$id*/)
    {
        //
        return view('mahasiswa.proyek.show');

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
