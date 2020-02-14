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
            'namaMahasiswa' => $row[2],
            'statusUser' => $row[3],
        ]);
    }
}
