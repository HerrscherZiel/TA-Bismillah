<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mahasiswa;
use App\MahasiswaProyek;
use App\KelompokProyek;
use App\Dosen;
use App\Admin;
use App\Proyek;
use App\Laporan;
use App\UsulMahasiswa;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function indexMahasiswa()
    {   
        if(Auth::guard('mahasiswa')->check()) {

        $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;
        $idMpro = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                                 ->where('mahasiswa_id', '=', $id)
                                 ->select('mahasiswaproyek.id_mahasiswaProyek')
                                 ->getQuery()
                                 ->get();
            $idm = array();
            foreach ($idMpro as $mpro){
            $idm[] = $mpro->id_mahasiswaProyek;
            }
        $kelompok = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('anggotakelompok', 'anggotakelompok.mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                    ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                    ->join('periode', 'periode_id', '=', 'id_periode')
                                    ->whereIn('anggotakelompok.mahasiswaProyek_id', $idm)
                                    ->where('statusAnggota', '=', 'Aktif')
                                    ->where('kelompokproyek.statusKelompok', '!=', "Non Aktif")
                                    ->select('kelompokproyek.*', 'namaKelasProyek', 'tahunAjaran', 'semester')
                                    ->distinct()
                                    ->getQuery()
                                    ->get();
                                    // dd($kelompok);
        if(count($kelompok) > 0){
            $dashboard = 1;
        }
        else{
            $dashboard = 0;
        }
        $dosen = Dosen::all();
        return view('mahasiswa.dashboard.index')->with('kelompok', $kelompok)
                                                ->with('dosen', $dosen)
                                                ->with('dashboard', $dashboard);

        }

        else{

            return view('errors.403');

        }
    }

    public function indexDosen()
    {   
        if(Auth::guard('dosen')->check()) {

        $id = Auth::guard('dosen')->user()->id_dosen;
        $proyek = Proyek::where('dosen_id', '=', $id)->count();

        $kelompokbim = KelompokProyek::where('dosen_id', '=', $id)
                                        ->where('statusKelompok', '=', 'Aktif')
                                        ->count();

        $laporan = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->where('dosen_id', '=', $id)
                            ->where('statusKelompok', '=', 'Aktif')
                            ->count();

        $laporanpro = Laporan::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
                            ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                            ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                            ->join('periode', 'id_periode', '=', 'periode_id')
                            ->where('dosen_id', '=', $id)
                            ->select('laporan.*', 'namaKelasProyek', 'semester', 'tahunAjaran', 'judulPrioritas')
                            ->limit(3)
                            ->orderBy('id_laporan', 'desc')
                            ->getQuery()
                            ->get();

        return view('dosen.dashboard.index')->with('proyek', $proyek)
                                            ->with('kelompokbim', $kelompokbim)
                                            ->with('laporan', $laporan)
                                            ->with('laporanpro', $laporanpro)
                                            ->with('id', $id);

        }

        else{

            return view('errors.403');

        }

    }

    public function indexAdmin()
    {

        //       $id = Auth::guard('dosen')->user()->id_dosen;

        if(Auth::guard('admin')->check()) {

        $admin   = Admin::all()->count();
        $dosen   = Dosen::all()->count();
        $mahasiswa   = Mahasiswa::all()->count();

        $mpro   = MahasiswaProyek::all()->count();
        $proyek = Proyek::all()->count();
        $kelompok = KelompokProyek::all()
                                        ->count();

        $usul = UsulMahasiswa::join('kelompokproyek', 'kelompokProyek_id', '=', 'id_kelompokProyek')
        ->join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
        ->join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
        ->join('kelasproyek', 'kelasproyek_id', '=', 'id_kelasProyek')
        ->join('periode', 'periode_id', '=', 'id_periode')
        ->where('usulmahasiswa.statusUsul', '=', 'Menunggu Persetujuan')
        ->where('kelasproyek.status', '=', "Aktif")
        ->select('mahasiswa.namaMahasiswa', 'mahasiswa.nim', 'mahasiswaproyek.id_mahasiswaproyek',
                'mahasiswaproyek.kelasProyek_id', 'mahasiswaproyek.periode_id', 
                'kelompokproyek.mahasiswaProyek_id','kelompokproyek.id_kelompokProyek', 
                'kelompokproyek.pm', 'usulmahasiswa.*', 'kelasproyek.namaKelasProyek',
                'periode.tahunAjaran', 'periode.semester', 'kelompokproyek.judulPrioritas')
        ->limit(3)
        ->orderBy('id_usulMahasiswa', 'desc')
        ->getQuery()
        ->get();

        $kelompokpro = KelompokProyek::join('mahasiswaproyek', 'mahasiswaProyek_id', '=', 'id_mahasiswaProyek')
                                ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
                                ->join('periode', 'periode_id', '=', 'id_periode')
                                ->where('statusKelompok', '=', "Menunggu Persetujuan")
                                ->where('kelasproyek.status', '=', "Aktif")
                                ->select('kelompokproyek.*','kelasproyek.namaKelasProyek'
                                        ,'periode.tahunAjaran', 'periode.semester')
                                ->limit(3)
                                ->orderBy('id_kelompokProyek', 'desc')
                                ->getQuery()
                                ->get();

        $namaDosen = Dosen::select('namaDosen', 'id_dosen')->getQuery()->get();

        // dd($usul);

        // dd($proyek);

        return view('admin.dashboard.index')->with('proyek', $proyek)
                                            ->with('kelompok', $kelompok)
                                            ->with('usul', $usul)
                                            ->with('dosen', $dosen)
                                            ->with('admin', $admin)
                                            ->with('namaDosen', $namaDosen)
                                            ->with('mahasiswa', $mahasiswa)
                                            ->with('kelompokpro', $kelompokpro)
                                            ->with('mpro', $mpro);

        }

        else{

            return view('errors.403');

        }

    }

}
