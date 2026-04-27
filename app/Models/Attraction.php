<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = ['city_id', 'name', 'name_ar', 'description', 'type', 'wiki_title', 'image_url'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
