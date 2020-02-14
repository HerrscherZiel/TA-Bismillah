<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyekPilihan extends Model
{
    //

    protected $table = 'proyekpilihan';

    public $primaryKey = 'id_proyekPilihan';

    public $timestamps = true;

    protected $fillable = [
        'kelompokProyek_id',
        'proyek_id',
        'prioritas',
    ];


    public function kelompokproyek(){
        return $this->belongsToMany('App\KelompokProyek', 'kelompokProyek_id');
    }

    public function proyek(){
        return $this->belongsTo('App\Proyek', 'proyek_id');
    }

}
