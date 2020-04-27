<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
