<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMovement extends Model
{
    //
    protected $fillable = [
    'user_id', 'movement_id', 'weight', 'time', 'reps'
    ];
}
