<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Laporan;
use App\MahasiswaProyek;
use App\Proyek;
use App\KelompokProyek;
use App\Dosen;
use App\Pencapaian;
use App\AgendaSelanjutnya;
use App\Milestone;
use App\Lampiran;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mahasiswa.laporan.index');

    }

    public  function indexDosen()
    {
        return view('dosen.laporan.index');
    }

    public function indexMahasiswa()
    {
        //

        //        dd($id);
        //ambil id mahasiswa ke mhsproyek
        $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;

//        dd($id);

        $laporan = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('mahasiswa', 'mahasiswa_id', '=' ,'id_mahasiswa')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->where('mahasiswa_id', '=', $id)
                                    ->where('statusKelompok', '=', 'Aktif')
                                    // ->whereIn('id_mahasiswaProyek', $b)
                                    ->select('kelompokproyek.*', 'mahasiswaproyek.*','kelasproyek.*', 'periode.*')
                                    ->getQuery()
                                    ->get();

        // dd($kelasperiode);
        

        return view('mahasiswa.laporan.index')->with('laporan', $laporan);

    }

    public function indexLaporanMahasiswa($id)
    {
        //

        //        dd($id);
        //ambil id mahasiswa ke mhsproyek

//        dd($id);

        $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->where('kelompokProyek_id', '=', $id)
                            // ->whereIn('id_mahasiswaProyek', $b)
                            ->select('kelompokproyek.*', 'laporan.*')
                            ->orderBy('id_laporan', 'desc')
                            ->getQuery()
                            ->get();

        // dd($laporan);
        

        return view('mahasiswa.laporan.indexLaporan')->with('laporan', $laporan);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa.laporan.create');
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
        Laporan::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/*$id*/)
    {
        //

        $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->where('id_laporan', '=', $id)
                            // ->whereIn('id_mahasiswaProyek', $b)
                            ->select('kelompokproyek.*', 'laporan.*')
                            ->orderBy('id_laporan', 'desc')
                            ->getQuery()
                            ->get();
        dd($laporan);

        $dosen = Dosen::all();


        return view('mahasiswa.laporan.show')->with('laporan', $laporan)
                                             ->with('dosen', $dosen);

    }

    public function showMahasiswa($id)
    {
        //
        $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->where('id_laporan', '=', $id)
                            // ->whereIn('id_mahasiswaProyek', $b)
                            ->select('kelompokproyek.*', 'laporan.*')
                            ->orderBy('id_laporan', 'desc')
                            ->getQuery()
                            ->get();

        $dosen = Dosen::all();

        $pencapaian = Pencapaian::join('laporan', 'id_laporan', '=', 'laporan_id')
                                 ->where('id_laporan', '=', $id)
                                 ->select('laporan.id_laporan', 'pencapaian.*')
                                 ->getQuery()
                                 ->get();

        // dd($pencapaian);

        $agenda = AgendaSelanjutnya::join('laporan', 'id_laporan', '=', 'laporan_id')
                                    ->where('id_laporan', '=', $id)
                                    ->select('laporan.id_laporan', 'agendaselanjutnya.*')
                                    ->getQuery()
                                    ->get();


        $kelid = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->where('id_laporan', '=', $id)
                            // ->whereIn('id_mahasiswaProyek', $b)
                            ->select('id_kelompokProyek')
                            ->getQuery()
                            ->get();   
                            
        //ambil id kel pro
        foreach($kelid as $ikel){
            $idke = $ikel->id_kelompokProyek;
        }

        // dd($idke);

        $milestone = Milestone::join('laporan', 'id_laporan', '=', 'laporan_id')
                                ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->where('id_kelompokProyek', '=', $idke)
                                ->select('laporan.id_laporan', 'milestone.*')
                                ->getQuery()
                                ->get();

        // dd($milestone);

        $lampiran = Lampiran::join('laporan', 'id_laporan', '=', 'laporan_id')
                            ->where('id_laporan', '=', $id)
                            ->select('laporan.id_laporan', 'lampiran.*')
                            ->getQuery()
                            ->get();

        // dd($lampiran);

        return view('mahasiswa.laporan.show')->with('laporan', $laporan)
                                             ->with('dosen', $dosen)
                                             ->with('pencapaian', $pencapaian)
                                             ->with('agenda', $agenda)
                                             ->with('milestone', $milestone)
                                             ->with('lampiran', $lampiran);

    }
//    public function  showDosen(/*$id*/)
//    {
//        return view('dosen.laporan.show');
//    }

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

            $laporan                    = Laporan::findOrFail($request->id_laporan);
            $laporan->tglMulai             = $request->tglMulai;
            $laporan->tglSelesai           = $request->tglSelesai;
            $laporan->tglKirim             = $request->tglKirim;

            $laporan->save();

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
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }
}
