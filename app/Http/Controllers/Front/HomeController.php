<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ModelKategori;
use App\Models\ModelPage;
use App\Models\ModelProduct;
use App\Models\ModelSlider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = ModelSlider::where('slider_is_active', true)
            ->orderBy('slider_sort_order')
            ->get();

        $kategori = ModelKategori::where('kategori_is_active', true)
            ->where('kategori_is_visible', true)
            ->orderBy('kategori_sort_order')
            ->get();

        $featuredProducts = ModelProduct::with('kategori')
            ->where('product_status', 'active')
            ->where('product_featured', true)
            ->latest()
            ->take(8)
            ->get();

        $latestProducts = ModelProduct::with('kategori')
            ->where('product_status', 'active')
            ->latest()
            ->take(12)
            ->get();

        return view('front.home.index', compact(
            'sliders',
            'kategori',
            'featuredProducts',
            'latestProducts'
        ));
    }

    public function productDetail($slug)
    {
        $product = ModelProduct::with('kategori')
            ->where('product_slug', $slug)
            ->where('product_status', 'active')
            ->firstOrFail();

        $relatedProducts = ModelProduct::with('kategori')
            ->where('product_status', 'active')
            ->where('product_kategori', $product->product_kategori)
            ->where('product_id', '!=', $product->product_id)
            ->latest()
            ->take(4)
            ->get();

        return view('front.product.detail', compact(
            'product',
            'relatedProducts'
        ));
    }

    public function kategoriDetail($slug)
    {
        $kategori = ModelKategori::where('kategori_slug', $slug)
            ->where('kategori_is_active', true)
            ->where('kategori_is_visible', true)
            ->firstOrFail();

        $products = ModelProduct::with('kategori')
            ->where('product_kategori', $kategori->kategori_id)
            ->where('product_status', 'active')
            ->latest()
            ->get();

        return view('front.kategori.detail', compact(
            'kategori',
            'products'
        ));
    }

    public function page($slug)
    {
        $page = ModelPage::where('page_slug', $slug)
            ->where('page_is_active', true)
            ->firstOrFail();

        return view('front.page.detail', compact('page'));
    }
}