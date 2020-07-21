<?php

namespace App\Imports;

use App\Mahasiswa;
use App\ProfilMahasiswa;
use App\MahasiswaProyek;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MahasiswaProyekImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    public function collection(Collection $rows)
    {   
        // dd($rows);
 

        $nimmhs = Mahasiswa::select('nim')->getQuery()->get();

        

        // dd($c);

        $a = 0;
        $b = 0;
        // dd($nimmhs);
        foreach ($rows as $row) {
            $nim = $row[0];
            // dd($nim);

            foreach($nimmhs as $nims){

                if($nim == $nims->nim ){
            
                    $a++;            
                }
    
                else{
                    $b++;
                }
            }
            
        }

        dd($a);

    }

}