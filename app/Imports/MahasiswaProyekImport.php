<?php

namespace App\Imports;

use App\Mahasiswa;
use App\ProfilMahasiswa;
use App\MahasiswaProyek;
use App\KelasProyek;
use App\Periode;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Facades\Validator;

HeadingRowFormatter::default('none');

class MahasiswaProyekImport implements ToCollection,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    public function collection(Collection $rows)
    {    
        Validator::make($rows->toArray(), [
            '*.NIM' => 'required',
            '*.Nama' => 'required',
            '*.Email' => 'required',
            '*.Kelas Proyek' => 'required | exists:kelasproyek,namaKelasProyek',
            '*.Semester' => 'required | exists:periode,semester',
            '*.Tahun Ajaran' => 'required | exists:periode,tahunAjaran',
        ],
        [ 'required' => 'Data ke :attribute tidak boleh kosong',
          'exists' => 'Data ke :attribute tidak terdapat di dalam sistem',]
        )->validate();

        foreach ($rows as $row) {
            if (Mahasiswa::where('nim', '=', $row['NIM'])->exists()) {
                
                $mhs = Mahasiswa::where('nim', '=', $row['NIM'])->getQuery()->get();
                $idmhs = array(); 
                foreach($mhs as $idm){ $idmhs = $idm->id_mahasiswa;}

                $klspro = KelasProyek::where('namaKelasProyek', '=', $row['Kelas Proyek'])->getQuery()->get();
                $idKlsPro = array(); 
                foreach($klspro as $kpro){$idKlsPro = $kpro->id_kelasProyek;}

                $period = Periode::where('semester', '=', $row['Semester'])->where('tahunAjaran', '=', $row['Tahun Ajaran'])
                                ->getQuery()
                                ->get();
                $idPer = array(); 
                foreach($period as $per){$idPer = $per->id_periode;}

                if(MahasiswaProyek::where('mahasiswa_id', '=', $idmhs)->where('kelasProyek_id', '=', $idKlsPro)
                                    ->where('periode_id', '=', $idPer)->exists()){}
                else{
                    MahasiswaProyek::create([
                        'mahasiswa_id'   => $idmhs,
                        'kelasProyek_id' => $idKlsPro,
                        'periode_id'     => $idPer
                    ]);
                }
            }

            else{
                $mahasiswa = Mahasiswa::create([
                'nim' => $row['NIM'],
                $nim6 = $row['NIM'],
                'namaMahasiswa' => $row['Nama'],
    
                preg_match('~/(.*?)/SV~', $nim6, $output),
                'username' => strval($output[1]),
                'password' => bcrypt(strval($output[1])),
                'passwordBackup' => strval($output[1]),
                'statusUser' => "Mahasiswa",
                ]);
    
                ProfilMahasiswa::create([
                    'mahasiswa_id'   => $mahasiswa->id_mahasiswa,
                    'email'          => $row['Email'],
                    'pengalaman'     => '-'
                ]);
                
                $klspro = KelasProyek::where('namaKelasProyek', '=', $row['Kelas Proyek'])->getQuery()->get();
                $idKlsPro = array(); 
                foreach($klspro as $kpro){$idKlsPro = $kpro->id_kelasProyek;}

                $period = Periode::where('semester', '=', $row['Semester'])->where('tahunAjaran', '=', $row['Tahun Ajaran'])
                                ->getQuery()
                                ->get();
                $idPer = array(); 
                foreach($period as $per){$idPer = $per->id_periode;}

                MahasiswaProyek::create([
                    'mahasiswa_id'   => $mahasiswa->id_mahasiswa,
                    'kelasProyek_id' => $idKlsPro,
                    'periode_id'     => $idPer
                ]);
            }
            
        }

    }

}