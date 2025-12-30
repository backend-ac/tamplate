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
        'footer_contacts',
        'footer_copyright',
        'head_metrics',
        'body_metrics',
        'default_meta_title',
        'default_meta_description',
        'default_meta_keywords',
        'og_image',
        'default_meta_tags',
    ];

    protected $casts = [
        'is_multilingual' => 'boolean',
        'locales' => 'array',
        'footer_contacts' => 'array',
        'head_metrics' => 'array',
        'body_metrics' => 'array',
        'default_meta_tags' => 'array',
    ];
}


