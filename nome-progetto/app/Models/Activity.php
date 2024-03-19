<?php

// File: app/Models/Activity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 'description', 'schedule',
    ];
}
