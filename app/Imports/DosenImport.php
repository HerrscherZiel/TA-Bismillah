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
            'nip' => $row[0],
            'email' => $row[1],
            'password' => bcrypt(12345678),
            'passwordBackup' => bcrypt(12345678),
            'namaDosen' => $row[2],
            'statusUser' => $row[3],
        ]);
    }
}
