<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'url',
        'description'
    ];
    public function project(){
        return $this ->belongsTo(Project::class);
    }
}
