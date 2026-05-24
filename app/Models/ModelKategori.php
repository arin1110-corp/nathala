<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelKategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'nathala_kategori';

    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'kategori_nama',
        'kategori_slug',
        'kategori_deskripsi',
        'kategori_thumbnail',
        'kategori_is_active',
        'kategori_is_visible',
        'kategori_meta_title',
        'kategori_meta_description',
        'kategori_sort_order',
    ];

    protected $casts = [
        'kategori_is_active' => 'boolean',
        'kategori_is_visible' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(
            ModelProduct::class,
            'product_kategori',
            'kategori_id'
        );
    }
}