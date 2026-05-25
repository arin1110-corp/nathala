<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;

class AnalyticsController extends Controller
{
    public function index()
    {
        $data = ModelProduct::with('kategori')
            ->orderByDesc('product_total_click')
            ->get();

        $totalClick = ModelProduct::sum('product_total_click');
        $totalSales = ModelProduct::sum('product_terjual');
        $totalProduct = ModelProduct::count();

        $featuredCount = ModelProduct::where('product_featured', true)
            ->count();

        $topProduct = ModelProduct::orderByDesc('product_total_click')
            ->first();

        return view('admin.analytics.index', compact(
            'data',
            'totalClick',
            'totalSales',
            'totalProduct',
            'featuredCount',
            'topProduct'
        ));
    }
}