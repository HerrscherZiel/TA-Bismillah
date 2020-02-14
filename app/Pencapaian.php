<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencapaian extends Model
{
    //

    protected $table = 'pencapaian';

    public $primaryKey = 'id_pencapaian';

    public $timestamps = true;

    protected $fillable = [
        'pencapaian',
        'deskripsi',
        'laporan_id',
    ];


    public function laporan(){
        return $this->belongsTo('App\Laporan', 'laporan_id');
    }


}
