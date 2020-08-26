<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Dosen;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class DosenImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function collection(Collection $rows)
    {   
        
        Validator::make($rows->toArray(), [
            '*.NIP' => 'required',
            '*.Nama' => 'required',
            '*.Email' => 'required | email | unique :dosen,email',
        ],
        [ 'unique' => 'Data ke :attribute  sudah memiliki data email yang sama.']
        )->validate();

        foreach ($rows as $row) {
                Dosen::create([
                'nip'        => $row['NIP'],
                'namaDosen'  => $row['Nama'],
                'email'      => $row['Email'],
                $email      = $row['Email'],
                $pw = explode("@", $email),
                'password' => bcrypt(strval($pw[0])),
                'passwordBackup' => strval($pw[0]),
                'hpDosen'    => '-',
                'statusUser' => 'Dosen',
            ]);
        }

    }

}




