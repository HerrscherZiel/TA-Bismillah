<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaProyek extends Model
{
    //
    protected $table = 'anggotaproyek';

    public $primaryKey = 'id_anggotaProyek';

    public $timestamps = true;

    protected $fillable = [
        'kelompokProyek_id',
        'mahasiswaProyek_id',
        'statusAnggota',
    ];


    public function kelompokpoyek(){
        return $this->belongsTo('App\KelompokProyek', 'kelompokProyek_id');
    }

    public function mahasiswaProyek(){
        return $this->belongsTo('App\MahasiswaProyek', 'MahasiswaProyek_id');
    }

}
