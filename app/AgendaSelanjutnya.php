<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaSelanjutnya extends Model
{
    //

    protected $table = 'agendaselanjutnya';

    public $primaryKey = 'id_agendaSelanjutnya';

    public $timestamps = true;

    protected $fillable = [
        'agendaSelanjutnya',
        'deskripsi',
        'laporan_id',
    ];


    public function laporan(){
        return $this->belongsTo('App\Laporan', 'laporan_id');
    }


}
