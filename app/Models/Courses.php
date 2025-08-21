<?php
namespace App\Models;   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Courses extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'slug',
        'short_content',
        'description',
        'main_image',
        'page_image',
        'status',
        'meta_title',
        'meta_description'
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
    public function additionalContents(): HasMany
    {
        return $this->hasMany(CoursesAdditional::class, 'courses_id');
    }

    public function highlightsContents(): HasMany
    {
        return $this->hasMany(CoursesHighlights::class, 'courses_id');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($page) {
            $page->slug = $page->createSlug($page->title);
        });
    }

    private function createSlug($title)
    {
        $slug = Str::slug($title);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
