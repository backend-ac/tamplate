<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
    ];

    protected $casts = [
        'title' => 'array',
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class)->orderBy('sort');
    }
}


