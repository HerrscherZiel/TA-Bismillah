<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilMahasiswa extends Model
{
    //
    protected $table = 'profilmahasiswa';

    public $primaryKey = 'id_profilMahasiswa';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'ipk',
        'sks',
        'hpMahasiswa',
        'keahlian',
        'pengalaman',
        'fileFoto',
        'mahasiswa_id',
    ];

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','mahasiswa_id');
    }
}
