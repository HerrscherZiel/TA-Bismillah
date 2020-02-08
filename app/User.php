<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'password',
        'admin_id',
        'dosen_id',
        'mahasiswa_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dosen(){
        return $this->belongsTo('App\Dosen','dosen_id');
    }

    public function mahasiswa(){
    return $this->belongsTo('App\Mahasiswa','mahasiswa_id');
    }

    public function admin(){
    return $this->belongsTo('App\Admin','admin_id');
    }

    public function mahasiswaProyek(){
        return $this->hasMany('App\MahasiswaProyek','user_id');
    }

}
