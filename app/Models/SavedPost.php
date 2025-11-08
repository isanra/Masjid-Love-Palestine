<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedPost extends Model
{
    use HasFactory;
    const UPDATED_AT = null; // Kita tidak butuh updated_at
    protected $fillable = ['post_id', 'user_id'];
}