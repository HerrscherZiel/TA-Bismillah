<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'mahasiswa';

    public $primaryKey = 'id_mahasiswa';

    public $timestamps = true;

    protected $fillable = [
        'nim',
        'namaMahasiswa',
        'statusUser',
    ];

    protected $attributes = [
        'statusUser' => 'Mahasiswa',
    ];

    public function users(){
        return $this->hasOne('App\Users','mahasiswa_id');
    }

    public function profilmahasiswa(){
        return $this->hasOne('App\ProfilMahasiswa','mahasiswa_id');
    }
}
