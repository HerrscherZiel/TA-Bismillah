<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admin';

    public $primaryKey = 'id_admin';

    public $timestamps = true;

    protected $fillable = [
        'nip',
        'namaAdmin',
        'statusUser',
    ];

    protected $attributes = [
        'statusUser' => 'Admin',
    ];

    public function users(){
        return $this->hasOne('App\Users','admin_id');
    }

}
