<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelMenu extends Model
{
    use HasFactory;

    protected $table = 'nathala_menu';

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'menu_nama',
        'menu_url',
        'menu_target',
        'menu_sort_order',
        'menu_is_active',
    ];

    protected $casts = [
        'menu_is_active' => 'boolean',
    ];
}