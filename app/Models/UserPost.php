<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserPost extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'user_id',
        'category_id'
    ];
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(400);
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')
              ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
              ->useDisk('public');
              
        $this->addMediaCollection('images')
              ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
              ->useDisk('public');
    }
    /**
     * Get the user that owns the userpost.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function claps()
    {
        return $this->hasMany(Clap::class, 'userpost_id');
    }
    
    /**
     * Check if the current user has clapped this post using eager-loaded relationship
     */
    public function hasUserClapped()
    {
        if (!Auth::check()) {
            return false;
        }
        
        // Use eager-loaded claps relationship to avoid additional queries
        return $this->claps->contains('user_id', Auth::id());
    }

    /**
     * Get the category that owns the userpost.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function imageUrl()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
    
    public function getImageUrl()
    {
        $media = $this->getFirstMedia();
        if (!$media) {
            return null;
        }
        
        // Simple URL generation that works with your setup
        return url('storage/' . $media->id . '/' . $media->file_name);
    }
    
    // Even simpler method - just get the direct file path
    public function getSimpleImageUrl()
    {
        $media = $this->getFirstMedia();
        if (!$media) {
            return null;
        }
        
        return 'http://localhost/laravel_learn/LearnLaravel/public/storage/' . $media->id . '/' . $media->file_name;
    }
    
    // Alternative method using the test route
    public function getMediaUrl()
    {
        $media = $this->getFirstMedia();
        if (!$media) {
            return null;
        }
        
        return url('/media/' . $media->id . '/' . $media->file_name);
    }
    public function readTime($wordsPerMinute = 100)
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute);

        return max(1, $minutes);
    }

public function created_at(){
    return $this->created_at->format('M d, Y');
}

}
