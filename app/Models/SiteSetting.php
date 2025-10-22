<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_multilingual',
        'default_locale',
        'locales',
        'logo',
        'head_metrics',
        'body_metrics',
    ];

    protected $casts = [
        'is_multilingual' => 'boolean',
        'locales' => 'array',
        'head_metrics' => 'array',
        'body_metrics' => 'array',
    ];
}


