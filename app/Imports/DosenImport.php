<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Dosen;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class DosenImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
                Dosen::create([
                'nip'        => $row[0],
                'hpDosen'    => '-',
                'namaDosen'  => $row[2],
                'email'      => $row[1],
                'password'   => bcrypt(12345678),
                'passwordBackup' => bcrypt(12345678),
                'statusUser' => $row[3],
            ]);

        }
    }

}

//    public function model(array $row)
//    {
//        //
//
//        return new Dosen([
//            'nip' => $row[0],
//            'email' => $row[1],
//            'password' => bcrypt(12345678),
//            'passwordBackup' => bcrypt(12345678),
//            'namaDosen' => $row[2],
//            'statusUser' => $row[3],
//        ]),
//
//        new ProfilDosen([
//
//        ]);
//
//    }



