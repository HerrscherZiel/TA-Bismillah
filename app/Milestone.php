<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    //

    protected $table = 'milestone';

    public $primaryKey = 'id_milestone';

    public $timestamps = true;

    protected $fillable = [
        'milestone',
        'statusMilestone',
        'tglTarget',
        'tglPerkiraan',
        'laporan_id',
    ];


    public function laporan(){
        return $this->belongsTo('App\Laporan', 'laporan_id');
    }

}
