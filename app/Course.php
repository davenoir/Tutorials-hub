<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use CanBeLiked;
    use SoftDeletes;

    public $timestamps = true;

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function version()
    {
        return $this->belongsTo(Version::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
