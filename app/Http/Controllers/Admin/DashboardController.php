<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use App\Models\ModelKategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = ModelProduct::count();

        $totalKategori = ModelKategori::count();

        $totalClick = ModelProduct::sum('product_total_click');

        $featuredProducts = ModelProduct::where('product_featured', true)->count();

        $recentProducts = ModelProduct::with('kategori')
            ->latest('product_id')
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalProducts',
            'totalKategori',
            'totalClick',
            'featuredProducts',
            'recentProducts'
        ));
    }
}