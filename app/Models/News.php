<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'ru_title',
        'en_title',
        'ru_content',
        'en_content',
        'is_visible',
    ];

}
