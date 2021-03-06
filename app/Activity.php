<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['description', 'like', 'dislike', 'user_id'];

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
