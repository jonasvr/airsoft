<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lidgeld extends Model
{
    protected $fillable = [
        'id', 'user_id','schuld',
    ];
}
