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
        'isPM',
        'statusAnggota',
    ];


    public function kelompokpoyek(){
        return $this->belongsTo('App\KelompokProyek', 'kelompokProyek_id');
    }

}
