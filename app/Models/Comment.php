<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Properti yang boleh diisi secara massal.
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'body',
        'parent_id',
    ];

    /**
     * Sebuah komentar dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
{
    // Urutkan balasan dari yang paling lama agar urutannya benar
    return $this->hasMany(Comment::class, 'parent_id')->oldest();
}
}