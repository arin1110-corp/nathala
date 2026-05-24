<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelProductImage extends Model
{
    use HasFactory;

    protected $table = 'nathala_product_images';

    protected $primaryKey = 'image_id';

    protected $fillable = [
        'image_product',
        'image_url',
        'image_is_featured',
        'image_sort_order',
        'image_is_active',
    ];

    protected $casts = [
        'image_is_featured' => 'boolean',
        'image_is_active' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(
            ModelProduct::class,
            'image_product',
            'product_id'
        );
    }
}