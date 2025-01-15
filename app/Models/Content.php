<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'small_content',
        'headline_content_1',
        'headline_content_2',
        'headline_content_3',
        'circle_assets_1',
        'circle_assets_2',
        'circle_assets_3',
        'image_1',
        'image_2',
    ];
}
