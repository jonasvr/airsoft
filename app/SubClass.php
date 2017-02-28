<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubClass extends Model
{
    protected $fillable = [
        'id', 'class_id', 'img','type'
    ];

    public function geweren()
    {
        return $this->hasmany('App\geweren','subclasse_id','id');
    }
}
