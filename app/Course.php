<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;


    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
