<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function technologies()
    {
        return $this->hasMany(Technology::class);
    }
}
