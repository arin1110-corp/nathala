<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;

class TrackingController extends Controller
{
    public function click($slug)
    {
        $product = ModelProduct::where('product_slug', $slug)
            ->where('product_status', 'active')
            ->firstOrFail();

        $product->increment('product_total_click');

        if (!$product->product_affiliate_link) {
            return redirect()->route('front.product.detail', $product->product_slug)
                ->with('error', 'Link affiliate belum tersedia.');
        }

        return redirect()->away($product->product_affiliate_link);
    }
}