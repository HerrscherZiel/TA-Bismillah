<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'admin';

    public $primaryKey = 'id_admin';

    public $timestamps = true;

    protected $fillable = [
        'nip',
        'email',
        'namaAdmin',
        'password',
        'passwordBackup',
        'statusUser',
    ];

    protected $attributes = [
        'statusUser' => 'Admin',
    ];

    protected $hidden = ['password'];


    public function users(){
        return $this->hasOne('App\Users','admin_id');
    }

}
