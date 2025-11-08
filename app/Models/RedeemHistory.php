<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemHistory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'redeem_item_id', 'points_redeemed'];

    // Relasi ke item yang ditukar
    public function redeemItem()
    {
        return $this->belongsTo(RedeemItem::class);
    }
}