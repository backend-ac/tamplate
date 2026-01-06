<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'type',
        'custom_name',
        'enabled',
        'show_in_navigation',
        'sort',
        'content',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'show_in_navigation' => 'boolean',
        'custom_name' => 'array',
        'content' => 'array',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}


