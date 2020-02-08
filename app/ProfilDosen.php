<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilDosen extends Model
{
    //
    protected $table = 'profildosen';

    public $primaryKey = 'id_profilDosen';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'hpDosen',
        'fileFoto',
        'dosen_id',
    ];

    public function dosen(){
        return $this->belongsTo('App\Dosen','dosen_id');
    }
}
