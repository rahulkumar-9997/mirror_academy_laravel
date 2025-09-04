<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseEligibility extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses_eligibilities';

    protected $fillable = [
        'courses_id',
        'title',
        'image',
        'content',
    ];

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}
