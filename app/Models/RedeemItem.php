<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemItem extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'points_cost', 'is_active'];
}