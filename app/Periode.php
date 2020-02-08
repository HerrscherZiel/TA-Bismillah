<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //

    protected $table = 'periode';

    public $primaryKey = 'id_periode';

    public $timestamps = true;

    protected $fillable = [
        'tahunMulai',
        'tahunSelesai',
    ];

    public function mahasiswaProyek(){
        return $this->hasMany('App\MahasiswaProyek','periode_id');
    }

    public function proyek(){
        return $this->hasMany('App\Proyek','periode_id');
    }
}
