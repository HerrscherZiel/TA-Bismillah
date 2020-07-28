<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Laporan extends Model
{
    //

    protected $table = 'laporan';

    public $primaryKey = 'id_laporan';

    public $timestamps = true;

    protected $fillable = [
        'tglMulai',
        'tglSelesai',
        'tglKirim',
        'kelompokProyek_id',
        'dosen_id',
    ];


    public function kelompokproyek(){
        return $this->belongsTo('App\KelompokProyek', 'kelompokProyek_id');
    }

    public function dosen(){
        return $this->belongsTo('App\Dosen', 'dosen_id');
    }

    public function milestone(){
        return $this->hasMany('App\Milestone', 'laporan_id');
    }

    public function lampiran(){
        return $this->hasMany('App\Lampiran', 'laporan_id');
    }

    public function agendaselanjutnya(){
        return $this->hasMany('App\AgendaSelanjutnya', 'laporan_id');
    }

    public function pencapaian(){
        return $this->hasMany('App\Pencapaian', 'laporan_id');
    }

    public function getTglMulaiAttribute(){
    return \Carbon\Carbon::parse($this->attributes['tglMulai'])
       ->format('D M Y');
    }

}
