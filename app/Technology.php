<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function versions()
    {
        return $this->hasMany(Version::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
