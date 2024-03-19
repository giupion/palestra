<?php
// Course.php
// File: app/Models/Course.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
