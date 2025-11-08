<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile; // Tambahkan ini di atas


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Menambahkan kolom role
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function profile()
{
    return $this->hasOne(Profile::class);
}
public function posts()
{
    return $this->hasMany(Post::class);
}

public function savedPosts()
{
    return $this->belongsToMany(Post::class, 'saved_posts')->orderBy('created_at', 'desc');
}
public function redeemHistories()
    {
        return $this->hasMany(RedeemHistory::class);
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
