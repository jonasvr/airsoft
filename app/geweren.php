<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class geweren extends Model
{
    protected $fillable = [
        'id', 'user_id','omschrijving','name','owner',
        'user_id','classe_id','img'
    ];
}
