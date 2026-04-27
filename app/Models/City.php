<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'name_ar', 'description', 'wiki_title', 'image_url'];

    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }
}
