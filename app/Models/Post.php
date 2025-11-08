<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'judul',
        'slug',
        'thumbnail',
        'isi',
        'video_url',
        'topik_utama',
        'views_count', // Pastikan ini ada
        'likes_count',
    ];

    /**
     * Relasi ke User (pembuat post).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Comment.
     */
    public function comments()
{
    // Hanya ambil komentar utama (bukan balasan) dan urutkan dari yang terbaru.
    return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
}

    /**
     * Relasi many-to-many ke User (yang me-like post).
     */
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_likes');
    }
    
    /**
     * Relasi ke PostView untuk tracking views
     */
    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    /**
     * Memeriksa apakah post ini sudah disukai oleh user tertentu.
     */
    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function isSavedBy(User $user)
    {
        return $this->savedBy()->where('user_id', $user->id)->exists();
    }

    public function savedBy()
    {
        return $this->belongsToMany(User::class, 'saved_posts');
    }

    /**
     * Method untuk record view
     */
    public function recordView($userId = null, $ipAddress = null)
    {
        // Cek apakah view sudah ada dalam 24 jam terakhir untuk mencegah spam
        $existingView = $this->views()
            ->where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subDay())
            ->first();

        if (!$existingView) {
            // Buat record view baru
            $this->views()->create([
                'user_id' => $userId,
                'ip_address' => $ipAddress,
            ]);

            // Update views_count
            $this->increment('views_count');
        }
    }
   
     
    public function getRouteKeyName()
    {
        return 'slug';
    }
}