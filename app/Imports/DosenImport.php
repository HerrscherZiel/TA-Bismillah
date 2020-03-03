<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Dosen;

class DosenImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //
        return new Dosen([
            'nip' => $row[1],
            'username' => $row[1],
            'password' => $row[1],
            'namaDosen' => $row[2],
            'statusUser' => $row[3],
        ]);
    }
}
