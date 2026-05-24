<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelSetting extends Model
{
    use HasFactory;

    protected $table = 'nathala_setting';

    protected $primaryKey = 'setting_id';

    protected $fillable = [
        'site_name',
        'site_tagline',
        'site_description',
        'site_logo',
        'site_favicon',
        'site_email',
        'site_phone',
        'site_whatsapp',
        'site_instagram',
        'site_tiktok',
        'site_youtube',
        'site_facebook',
        'site_meta_title',
        'site_meta_description',
        'site_google_analytics',
        'site_meta_pixel',
    ];
}