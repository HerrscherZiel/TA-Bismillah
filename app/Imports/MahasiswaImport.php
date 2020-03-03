<?php

namespace App\Imports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            //
            'nim' => $row[1],
            $nim6 = $row[1],
//            $nim6 =


//            $input = "17/416344/SV/14082",
            preg_match('~/(.*?)/SV~', $nim6, $output),
//            'namaMahasiswa' => strval($output[1]),

//            dd($output[1]),
//            $nim7 = strval($output[1]),
            'username' => strval($output[1]),
            'password' => bcrypt(strval($output[1])),
            'namaMahasiswa' => $row[2],
            'statusUser' => "Mahasiswa",
        ]);
    }
}
