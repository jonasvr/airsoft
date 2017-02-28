<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $fillable = [
        'id', 'type'
    ];

    public function geweren()
    {
        return $this->hasmany('App\geweren','user_id','id');
    }
}
