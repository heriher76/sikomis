<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kahmi extends Model
{
    protected $table = 'kahmi';

    protected $fillable = ['name', 'email', 'birthplace', 'birthday', 'address', 'phone', 'organizations', 'formals', 'jobs', 'trainings'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
