<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'name_ar',
        'original_price',
        'discount_price',
        'valid_until',
        'audience',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'original_price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
