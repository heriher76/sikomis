<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infoweb extends Model
{
    protected $table = 'infoweb';

    protected $fillable = ['name_contact_lk',	'number_contact_lk',	'instagram',	'facebook',	'twitter',	'youtube',	'google',	'slider1',	'slider2',	'slider3'];
}
