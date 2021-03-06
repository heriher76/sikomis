<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'jk', 'username','phone','alamatAsal','alamatSekarang','tempat','tanggalLahir','jurusan','angkatan','sma','lulusSma','smp','lulusSmp','sd','lulusSd','organisasiSma','organisasiKuliah','organisasiLainnya','penyakit','hobby','keahlian','bahasa','namaAyah','namaIbu','jumlahSaudara','anakKeberapa','harapan','alasan','sudahLK','sudahUpgrading','sudahPelantikan','photoprofile','formals','trainings','organizations','jobs'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function news() {
        return $this->hasMany('App\News', 'user_id');
    }

    public function articles() {
        return $this->hasMany('App\Article', 'user_id');
    }

    public function activities() {
        return $this->hasMany('App\Activity', 'user_id');
    }
}
