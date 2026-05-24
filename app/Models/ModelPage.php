<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelPage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'nathala_page';

    protected $primaryKey = 'page_id';

    protected $fillable = [
        'page_judul',
        'page_slug',
        'page_content',
        'page_thumbnail',
        'page_meta_title',
        'page_meta_description',
        'page_is_active',
    ];

    protected $casts = [
        'page_is_active' => 'boolean',
    ];
}