<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'nama_belakang',
    'bio',
    'foto_profil',
    'banner_image',
    'no_telp',
    'lokasi_maps',
    'poin',               // <-- Tambahkan ini
    'unredeemed_views',   // <-- Tambahkan ini
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}