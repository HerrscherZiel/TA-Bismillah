<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasProyek extends Model
{
    //
    protected $table = 'kelasproyek';

    public $primaryKey = 'id_kelasProyek';

    public $timestamps = true;

    protected $fillable = [
        'namaKelasProyek',
        'deskripsi',
        'maksAnggota',
        'status',

    ];

    public function mahasiswaProyek(){
        return $this->hasMany('App\MahasiswaProyek','kelasProyek_id');
    }


    public function proyek(){
        return $this->hasMany('App\Proyek','kelasProyek_id');
    }
}
