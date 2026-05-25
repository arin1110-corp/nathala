<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;

class ClickController extends Controller
{
    public function index()
    {
        $data = ModelProduct::with('kategori')
            ->orderByDesc('product_total_click')
            ->get();

        $totalClick = ModelProduct::sum('product_total_click');

        $topProduct = ModelProduct::orderByDesc('product_total_click')
            ->first();

        return view('admin.click.index', compact(
            'data',
            'totalClick',
            'topProduct'
        ));
    }
}