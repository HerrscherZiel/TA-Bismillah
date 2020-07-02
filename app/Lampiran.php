<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    //
    protected $table = 'lampiran';

    public $primaryKey = 'id_lampiran';

    public $timestamps = true;

    protected $fillable = [
        'lampiran',
        'fileLampiran',
        'laporan_id',
    ];


    public function laporan(){
        return $this->belongsTo('App\Laporan', 'laporan_id');
    }
}
