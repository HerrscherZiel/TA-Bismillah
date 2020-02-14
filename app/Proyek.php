<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    //
    protected $table = 'proyek';

    public $primaryKey = 'id_proyek';

    public $timestamps = true;

    protected $fillable = [
        'judul',
        'deskripsi',
        'statusProyek',
        'kelasProyek_id',
        'periode_id',
        'usulMahasiswa_id',
    ];


    public function periode(){
        return $this->belongsTo('App\Periode', 'periode_id');
    }

    public function kelasproyek(){
        return $this->belongsTo('App\KelasProyek', 'kelasProyek_id');
    }

    public function status(){
        return $this->belongsTo('App\Status', 'statusProyek');
    }

    public function usulmahasiswa(){
        return $this->belongsTo('App\UsulMahasiswa', 'usulMahasiswa_id');
    }

    public function proyek(){
        return $this->hasMany('App\ProyekPilihan', 'proyek_id');
    }
}
