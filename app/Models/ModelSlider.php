<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelSlider extends Model
{
    use HasFactory;

    protected $table = 'nathala_slider';

    protected $primaryKey = 'slider_id';

    protected $fillable = [
        'slider_nama',
        'slider_judul',
        'slider_deskripsi',
        'slider_image',
        'slider_link',
        'slider_button_text',
        'slider_sort_order',
        'slider_is_active',
        'slider_mulai',
        'slider_selesai',
        'slider_alt_text',
    ];

    protected $casts = [
        'slider_is_active' => 'boolean',
        'slider_mulai' => 'datetime',
        'slider_selesai' => 'datetime',
    ];
}