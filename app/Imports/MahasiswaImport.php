<?php

namespace App\Imports;

use App\Mahasiswa;
use App\ProfilMahasiswa;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Facades\Validator;


HeadingRowFormatter::default('none');


class MahasiswaImport implements ToCollection, WithHeadingRow
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
            '*.Email' => 'required | email | unique :profilmahasiswa,email',
        ],
        [ 'unique' => 'Data ke :attribute  sudah memiliki data email yang sama.']
        )->validate();

        foreach ($rows as $row) {
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
        }
    }

}

//public function model(array $row)
//{
//    return new Mahasiswa([
//        //
//        'nim' => $row[1],
//        $nim6 = $row[1],
////            $nim6 =
//
//
////            $input = "17/416344/SV/14082",
//        preg_match('~/(.*?)/SV~', $nim6, $output),
////            'namaMahasiswa' => strval($output[1]),
//
////            dd($output[1]),
////            $nim7 = strval($output[1]),
//        'username' => strval($output[1]),
//        'password' => bcrypt(strval($output[1])),
//        'passwordBackup' => bcrypt(strval($output[1])),
//        'namaMahasiswa' => $row[2],
//        'statusUser' => "Mahasiswa",
//    ]);
//}
