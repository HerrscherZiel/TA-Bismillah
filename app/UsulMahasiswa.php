<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsulMahasiswa extends Model
{
    //

    protected $table = 'usulmahasiswa';

    public $primaryKey = 'id_usulMahasiswa';

    public $timestamps = true;

    protected $fillable = [
        'judulUsul',
        'deskripsi',
        'kelompokProyek_id',
        'statusUsul',
    ];


    public function kelompokproyek(){
        return $this->belongsTo('App\KelompokProyek', 'kelompokProyek_id');
    }

    public function proyek(){
        return $this->hasOne('App\Proyek', 'usulMahasiswa_id');
    }

}
