<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];
    public function pictures(){
        return $this -> hasMany(Picture::class);
    }
}
