<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //

    protected $table = 'status';

    public $primaryKey = 'id_status';

    public $timestamps = true;

    protected $fillable = [
        'namaStatus',
        'deskripsi',
    ];


    public function kelompokproyek(){
        return $this->hasMany('App\AnggotaKelompok','statusKelompok');
    }

    public function anggotaproyek(){
        return $this->hasMany('App\AnggotaProyek','statusAnggota');
    }

    public function usulmahasiswa(){
        return $this->hasMany('App\UsulMahasiswa','statusProyek');
    }

    public function proyek(){
        return $this->hasMany('App\Proyek','statusProyek');
    }

}
