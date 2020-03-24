<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $guarded = [];
    public $timestamps = false;

    public function assessment() {
        return $this->hasOne(AssessmentType::class, 'id', 'assessment_type');
    }

    public function coordinator()
    {
        return $this->hasOne(Teacher::class, 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
