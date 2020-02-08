<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    //
    protected $table = 'usulmahasiswa';

    public $primaryKey = 'id_usulMahasiswa';

    public $timestamps = true;

    protected $fillable = [
        'judulUsul',
        'deskripsi',
        'mahasiswaProyek_id',
        'statusProyek',
    ];


    public function mahasiswaproyek(){
        return $this->belongsTo('App\MahasiswaProyek', 'mahasiswaProyek_id');
    }

    public function proyek(){
        return $this->hasOne('App\Proyek', 'usulMahasiswa_id');
    }
}
