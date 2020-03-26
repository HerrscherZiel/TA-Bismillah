<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dosen extends Authenticatable

{
    //
    use Notifiable;

    protected $guard = 'dosen';

    protected $table = 'dosen';

    public $primaryKey = 'id_dosen';

    public $timestamps = true;

    protected $fillable = [
        'nip',
        'email',
        'namaDosen',
        'hpDosen',
        'fileFoto',
        'password',
        'passwordBackup',
        'statusUser',
    ];

    protected $hidden = ['password'];


//    public function users(){
//        return $this->hasOne('App\Users','dosen_id');
//    }
}
