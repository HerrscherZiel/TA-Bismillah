<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokProyek extends Model
{
    //

    protected $table = 'kelompokproyek';

    public $primaryKey = 'id_kelompokProyek';

    public $timestamps = true;

    protected $fillable = [
        'mahasiswaProyek_id',
        'pm',
        'judulPrioritas',
        'dosen_id',
        'statusKelompok',
    ];


    public function mahasiswaproyek(){
        return $this->belongsTo('App\MahasiswaProyek', 'mahasiswaProyek_id');
    }

    public function dosen(){
        return $this->belongsTo('App\Dosen', 'dosen_id');
    }

    public function anggotakelompok(){
        return $this->hasMany('App\AnggotaKelompok', 'kelompokProyek_id');
    }

    public function laporan(){
        return $this->hasMany('App\Laporan', 'kelompokProyek_id');
    }

    public function proyekpilihan(){
        return $this->hasOne('App\ProyekPilihan', 'kelompokProyek_id');
    }

}
