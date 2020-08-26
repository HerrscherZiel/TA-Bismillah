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
use App\AnggotaProyek;
use App\Milestone;
use App\Lampiran;
use Carbon\Carbon;



class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public  function indexDosen()
    {
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
            
            return view('dosen.laporan.index')->with('kelasperiode', $kelasperiode);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexLaporanDosen($idkel, $idper){

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
                return view('dosen.laporan.indexLaporan')->with('dosen', $dosen)
                                                            ->with('kelompok', $kelompok);
            }

        }

        else{

            return view('errors.403');

        }
    }

    public function indexLaporanKelompokDosen($idkel){

        if(Auth::guard('dosen')->check()) {

            $exist = KelompokProyek::findOrFail($idkel);
            $id = Auth::guard('dosen')->user()->id_dosen;

            $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->where('kelompokProyek_id', '=', $idkel)
                            ->where('dosen_id', '=', $id)
                            ->select('kelompokproyek.*', 'laporan.*')
                            ->orderBy('id_laporan', 'desc')
                            ->getQuery()
                            ->get();
            
            $kelBimb = KelompokProyek::join('dosen', 'dosen_id', '=', 'id_dosen')
                                        ->where('id_kelompokProyek', '=', $idkel)
                                        ->where('dosen_id', '=', $id)
                                        ->select('kelompokproyek.dosen_id', 'dosen.namaDosen')
                                        ->getQuery()
                                        ->get();

            if(count($kelBimb) < 1){
                return view('errors.403');
            }
            else{
                return view('dosen.laporan.indexLaporanKelompok')->with('laporan', $laporan);
            }
        }

        else{

            return view('errors.403');

        }
    }

    public function indexMahasiswa()
    {
        //

        if(Auth::guard('mahasiswa')->check()) {

        $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;

        
        $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                ->where('mahasiswa_id', '=', $id)
                                ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 'kelasproyek.namaKelasProyek', 'mahasiswa.namaMahasiswa')
                                ->getQuery()
                                ->get();

        $idmp = array();
        foreach ($idMpro as $idm)
            $idmp[] = $idm->id_mahasiswaProyek;
            
        $laporan = KelompokProyek::join('anggotakelompok','kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->join('mahasiswaproyek', 'anggotakelompok.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->whereIn('anggotaKelompok.mahasiswaProyek_id',  $idmp)
                                    ->where('statusKelompok', '=', 'Aktif')
                                    ->select('kelompokproyek.*', 'mahasiswaproyek.*','kelasproyek.*', 'periode.*')
                                    ->getQuery()
                                    ->get();        

        return view('mahasiswa.laporan.index')->with('laporan', $laporan);

        }

        else{
            return view('errors.403');
        }

    }

    public function indexLaporanMahasiswa($id)
    {
        //

        if(Auth::guard('mahasiswa')->check()) {

        $exist = KelompokProyek::findOrFail($id);
        $ids = Auth::guard('mahasiswa')->user()->id_mahasiswa;
        $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                ->where('mahasiswa_id', '=', $ids)
                                ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 
                                'kelasproyek.namaKelasProyek', 'mahasiswa.namaMahasiswa')
                                ->getQuery()
                                ->get();
        $idmp = array();
        foreach ($idMpro as $idm)
            $idmp[] = $idm->id_mahasiswaProyek;
        $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->join('mahasiswaproyek', 'kelompokproyek.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                            ->join('anggotakelompok', 'anggotakelompok.kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->where('id_kelompokProyek', '=', $id)
                            ->whereIn('anggotaKelompok.mahasiswaProyek_id', $idmp)
                            ->select('kelompokproyek.*', 'laporan.*')
                            ->orderBy('id_laporan', 'desc')
                            ->getQuery()
                            ->get();   
        $anggota = AnggotaProyek::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                 ->join('mahasiswaproyek', 'kelompokproyek.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                 ->where('id_kelompokProyek', '=', $id)
                                 ->whereIn('anggotaKelompok.mahasiswaProyek_id', $idmp)
                                 ->select('anggotakelompok.mahasiswaProyek_id')
                                 ->getQuery()
                                 ->get();
            if(count($anggota) < 1){
                return view('errors.403');
            }
            else{
                $idkel = $id;
                return view('mahasiswa.laporan.indexLaporan')->with('laporan', $laporan)
                                                                ->with('idkel', $idkel);
            }

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

        $this->validate($request, [
            'kelompokProyek_id' => 'required',
            'tglMulai' => 'required',
            'tglSelesai' => 'required | after_or_equal:tglMulai',
            'tglKirim' => 'required | after_or_equal:tglSelesai'
        ]);

        Laporan::create($request->all());
        return back()->with('success', 'Berhasil menambah laporan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDosen($id)
    {
        //
        if(Auth::guard('dosen')->check()) {

            $ids = Auth::guard('dosen')->user()->id_dosen;
            $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->where('id_laporan', '=', $id)
                                ->select('kelompokproyek.*', 'laporan.*')
                                ->orderBy('id_laporan', 'desc')
                                ->getQuery()
                                ->get();

            if(count($laporan) < 1){
                return view('errors.404');
            }
            elseif($laporan[0]->dosen_id != $ids){
                return view('errors.403');
            }
            else{
                $dosen = Dosen::all();

                $pencapaian = Pencapaian::join('laporan', 'id_laporan', '=', 'laporan_id')
                                        ->where('id_laporan', '=', $id)
                                        ->select('laporan.id_laporan', 'pencapaian.*')
                                        ->getQuery()
                                        ->get();

                $agenda = AgendaSelanjutnya::join('laporan', 'id_laporan', '=', 'laporan_id')
                                            ->where('id_laporan', '=', $id)
                                            ->select('laporan.id_laporan', 'agendaselanjutnya.*')
                                            ->getQuery()
                                            ->get();


                $kelid = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('id_laporan', '=', $id)
                                    ->select('id_kelompokProyek')
                                    ->getQuery()
                                    ->get();   
                
                $idke = array();
                foreach($kelid as $ikel){
                    $idke = $ikel->id_kelompokProyek;
                }

                $milestone = Milestone::join('laporan', 'id_laporan', '=', 'laporan_id')
                                        ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                        ->where('id_kelompokProyek', '=', $idke)
                                        ->select('laporan.id_laporan', 'milestone.*')
                                        ->getQuery()
                                        ->get();

                $lampiran = Lampiran::join('laporan', 'id_laporan', '=', 'laporan_id')
                                    ->where('id_laporan', '=', $id)
                                    ->select('laporan.id_laporan', 'lampiran.*')
                                    ->getQuery()
                                    ->get();

                return view('dosen.laporan.detailLaporanProyek')->with('laporan', $laporan)
                                                    ->with('dosen', $dosen)
                                                    ->with('pencapaian', $pencapaian)
                                                    ->with('agenda', $agenda)
                                                    ->with('milestone', $milestone)
                                                    ->with('lampiran', $lampiran);
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
            $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->where('mahasiswa_id', '=', $ids)
                                    ->select('mahasiswaproyek.id_mahasiswaProyek', 'mahasiswaproyek.kelasProyek_id', 
                                        'kelasproyek.namaKelasProyek', 'mahasiswa.namaMahasiswa')
                                    ->getQuery()
                                    ->get();
            $idmp = array();
            foreach ($idMpro as $idm)
                $idmp[] = $idm->id_mahasiswaProyek;

            $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->join('mahasiswaproyek', 'kelompokproyek.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->join('anggotakelompok', 'anggotakelompok.kelompokProyek_id', '=', 'id_kelompokProyek')
                                ->whereIn('anggotakelompok.mahasiswaProyek_id', $idmp)
                                ->where('id_laporan', '=', $id)
                                ->select('kelompokproyek.*', 'laporan.*')
                                ->orderBy('id_laporan', 'desc')
                                ->getQuery()
                                ->get();

            if(count($laporan) < 1){
                return view('errors.404');
            }
            else{
                
                $dosen = Dosen::all();
                $pencapaian = Pencapaian::join('laporan', 'id_laporan', '=', 'laporan_id')
                                        ->where('id_laporan', '=', $id)
                                        ->select('laporan.id_laporan', 'pencapaian.*')
                                        ->getQuery()
                                        ->get();
                $agenda = AgendaSelanjutnya::join('laporan', 'id_laporan', '=', 'laporan_id')
                                            ->where('id_laporan', '=', $id)
                                            ->select('laporan.id_laporan', 'agendaselanjutnya.*')
                                            ->getQuery()
                                            ->get();
                $kelid = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                    ->where('id_laporan', '=', $id)
                                    ->select('id_kelompokProyek')
                                    ->getQuery()
                                    ->get();   
                $idke = array();
                foreach($kelid as $ikel){
                    $idke = $ikel->id_kelompokProyek;
                }
                $milestone = Milestone::join('laporan', 'id_laporan', '=', 'laporan_id')
                                        ->join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                                        ->where('id_kelompokProyek', '=', $idke)
                                        ->select('laporan.id_laporan', 'milestone.*')
                                        ->getQuery()
                                        ->get();
                $lampiran = Lampiran::join('laporan', 'id_laporan', '=', 'laporan_id')
                                    ->where('id_laporan', '=', $id)
                                    ->select('laporan.id_laporan', 'lampiran.*')
                                    ->getQuery()
                                    ->get();
                return view('mahasiswa.laporan.show')->with('laporan', $laporan)
                                                    ->with('dosen', $dosen)
                                                    ->with('pencapaian', $pencapaian)
                                                    ->with('agenda', $agenda)
                                                    ->with('milestone', $milestone)
                                                    ->with('lampiran', $lampiran);
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
        // dd($request);
        $this->validate($request, [
            'tglMulai' => 'required',
            'tglSelesai' => 'required | after_or_equal:tglMulai',
            'tglKirim' => 'required | after_or_equal:tglSelesai'
        ]);
            $laporan                    = Laporan::findOrFail($request->id_laporan);
            $laporan->tglMulai             = $request->tglMulai;
            $laporan->tglSelesai           = $request->tglSelesai;
            $laporan->tglKirim             = $request->tglKirim;

            $laporan->save();

            return back()->with('success', 'Berhasil mengubah laporan');

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

        return back()->with('success', 'Berhasil menghapus laporan');
    }
}
