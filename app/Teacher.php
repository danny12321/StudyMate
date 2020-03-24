<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Courses;

class Teacher extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function getNameAttribute($value) {
        return decrypt($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = encrypt($value);
    }

    public function courses() {
        return $this->belongsToMany(Courses::class);
    }
}
