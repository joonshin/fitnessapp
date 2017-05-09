<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMovement extends Model
{
    //
    protected $fillable = [
    'user_id', 'movement_id', 'weight', 'time', 'reps'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function movement()
    {
      return $this->belongsTo('App\Movement');
    }
}
