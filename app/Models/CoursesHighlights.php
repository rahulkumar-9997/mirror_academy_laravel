<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoursesHighlights extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses_highlights';
    protected $fillable = [
        'courses_id',
        'icon',
        'content',
        'short_order'
    ];
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}