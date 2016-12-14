<?php

namespace App;
use App\SubClass;

use Illuminate\Database\Eloquent\Model;

class geweren extends Model
{
    protected $fillable = [
        'id', 'user_id','omschrijving','name','owner',
        'user_id','subclasse_id','img'
    ];

    public function scopeUserAll($query,$id)
    {
        return $query->where('user_id',$id);
    }

    public function scopeSubClasses($query)
    {
        return $query->join('sub_classes', 'gewerens.subclasse_id','=','sub_classes.id');
    }

    public function scopeArmorType($query,$id)
    {
        return $query->join('sub_classes', 'gewerens.subclasse_id','=','sub_classes.id')
            ->join('classes', 'sub_classes.id','=','classes.id')
            ->where('classes.id','=',$id);
    }
}
