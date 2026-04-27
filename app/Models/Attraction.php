<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attraction extends Model
{
    protected $fillable = ['city_id', 'name', 'name_ar', 'description', 'type', 'wiki_title', 'image_url', 'status', 'submitter_id'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function submitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'submitter_id');
    }
}
