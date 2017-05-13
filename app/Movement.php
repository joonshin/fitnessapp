<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    //
    protected $fillable = [
    'name'
    ];

    public function users()
    {
      return $this->belongsToMany('App\User');
    }

    public function userMovements()
    {
      return $this->hasMany('App\UserMovement');
    }
}
