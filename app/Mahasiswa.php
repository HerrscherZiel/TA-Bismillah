<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Mahasiswa extends Authenticatable

{
    use Notifiable;

    protected $guard = 'mahasiswa';
    //
    protected $table = 'mahasiswa';

    public $primaryKey = 'id_mahasiswa';

    public $timestamps = true;

    protected $fillable = [
        'nim',
        'username',
        'password',
        'namaMahasiswa',
        'statusUser',
    ];

    protected $hidden = ['password'];
//
//    public function getAuthPassword()
//    {
//        return $this->password;
//    }


    public function mahasiswaproyek(){
        return $this->hasMany('App\MahasiswaProyek','mahasiswa_id');
    }

    public function profilmahasiswa(){
        return $this->hasOne('App\ProfilMahasiswa','mahasiswa_id');
    }
}
