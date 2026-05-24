<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'nathala_product';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_nama',
        'product_slug',
        'product_kategori',
        'product_merk',
        'product_sku',
        'product_platform',
        'product_affiliate_link',
        'product_original_link',
        'product_deskripsi',
        'product_deskripsi_ringkas',
        'product_harga',
        'product_harga_diskon',
        'product_thumbnail',
        'product_badge',
        'product_featured',
        'product_total_click',
        'product_terjual',
        'product_status',
        'product_published_at',
        'product_meta_title',
        'product_meta_description',
        'product_is_index',
        'product_attributes',
    ];

    protected $casts = [
        'product_featured' => 'boolean',
        'product_is_index' => 'boolean',
        'product_attributes' => 'array',
        'product_published_at' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(
            ModelKategori::class,
            'product_kategori',
            'kategori_id'
        );
    }

    public function images()
    {
        return $this->hasMany(
            ModelProductImage::class,
            'image_product',
            'product_id'
        )->orderBy('image_sort_order');
    }
}