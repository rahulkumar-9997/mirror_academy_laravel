<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoursesAdditional extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses_additional';
    protected $fillable = [
        'courses_id',
        'title',
        'description',
        'image',
        'short_order'
    ];
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}