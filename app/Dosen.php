<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
    protected $table = 'dosen';

    public $primaryKey = 'id_dosen';

    public $timestamps = true;

    protected $fillable = [
        'nip',
        'username',
        'password',
        'namaDosen',
        'statusUser',
    ];

    public function users(){
        return $this->hasOne('App\Users','dosen_id');
    }

    public function profilDosen(){
        return $this->hasOne('App\ProfilDosen','dosen_id');
    }

}
