<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahasiswaProyek extends Model
{
    //
    protected $table = 'mahasiswaproyek';

    public $primaryKey = 'id_mahasiswaProyek';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'kelasProyek_id',
        'periode_id',

    ];

    public function periode(){
        return $this->belongsTo('App\Periode','periode_id');
    }

    public function kelasproyek(){
        return $this->belongsTo('App\KelasProyek','kelasProyek_id');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function kelompokproyek(){
        return $this->hasOne('App\KelompokProyek','mahasiswaProyek_id');
    }

    public function usulmahasiswa(){
        return $this->hasOne('App\UsulMahasiswa','mahasiswaProyek_id');
    }

}
