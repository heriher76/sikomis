<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['no_rek', 'atas_nama', 'bank', 'nama_wa', 'no_wa'];
}
