<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    protected $table = 'icons';
    protected $fillable = [
        'class',
        'name'
    ];
}
