<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelProduct;
use App\Models\ModelKategori;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $data = ModelProduct::with('kategori')
            ->latest()
            ->get();

        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        $kategori = ModelKategori::where('kategori_is_active', true)->get();

        return view('admin.product.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_nama' => 'required',
            'product_kategori' => 'required',
        ]);

        $data = new ModelProduct();

        $data->product_nama = $request->product_nama;
        $data->product_slug = Str::slug($request->product_nama);

        $data->product_kategori = $request->product_kategori;
        $data->product_merk = $request->product_merk;
        $data->product_sku = $request->product_sku;

        $data->product_platform = $request->product_platform ?? 'shopee';
        $data->product_affiliate_link = $request->product_affiliate_link;
        $data->product_original_link = $request->product_original_link;

        $data->product_deskripsi = $request->product_deskripsi;
        $data->product_deskripsi_ringkas = $request->product_deskripsi_ringkas;

        $data->product_harga = $request->product_harga;
        $data->product_harga_diskon = $request->product_harga_diskon;

        $data->product_badge = $request->product_badge;

        $data->product_featured = $request->has('product_featured');

        $data->product_status = $request->product_status ?? 'draft';

        $data->product_meta_title = $request->product_meta_title;
        $data->product_meta_description = $request->product_meta_description;

        $data->product_is_index = $request->has('product_is_index');

        $data->product_attributes = $request->product_attributes
            ? json_decode($request->product_attributes, true)
            : null;

        // simple thumbnail (tanpa storage dulu)
        if ($request->hasFile('product_thumbnail')) {
            $file = $request->file('product_thumbnail');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product'), $name);
            $data->product_thumbnail = 'uploads/product/' . $name;
        }

        $data->save();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = ModelProduct::findOrFail($id);
        $kategori = ModelKategori::where('kategori_is_active', true)->get();

        return view('admin.product.edit', compact('item', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelProduct::findOrFail($id);

        $data->product_nama = $request->product_nama;
        $data->product_slug = Str::slug($request->product_nama);

        $data->product_kategori = $request->product_kategori;
        $data->product_merk = $request->product_merk;
        $data->product_sku = $request->product_sku;

        $data->product_platform = $request->product_platform ?? 'shopee';
        $data->product_affiliate_link = $request->product_affiliate_link;
        $data->product_original_link = $request->product_original_link;

        $data->product_deskripsi = $request->product_deskripsi;
        $data->product_deskripsi_ringkas = $request->product_deskripsi_ringkas;

        $data->product_harga = $request->product_harga;
        $data->product_harga_diskon = $request->product_harga_diskon;

        $data->product_badge = $request->product_badge;

        $data->product_featured = $request->has('product_featured');

        $data->product_status = $request->product_status ?? 'draft';

        $data->product_meta_title = $request->product_meta_title;
        $data->product_meta_description = $request->product_meta_description;

        $data->product_is_index = $request->has('product_is_index');

        $data->product_attributes = $request->product_attributes
            ? json_decode($request->product_attributes, true)
            : null;

        if ($request->hasFile('product_thumbnail')) {
            $file = $request->file('product_thumbnail');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product'), $name);
            $data->product_thumbnail = 'uploads/product/' . $name;
        }

        $data->save();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product berhasil diupdate');
    }

    public function destroy($id)
    {
        // soft delete (karena model pakai SoftDeletes)
        ModelProduct::findOrFail($id)->delete();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product berhasil dihapus');
    }

    public function toggleStatus($id)
{
    $product = ModelProduct::findOrFail($id);

    if ($product->product_status === 'active') {
        $product->product_status = 'archived'; // non aktif
    } else {
        $product->product_status = 'active'; // aktifkan
    }

    $product->save();

    return redirect()
        ->back()
        ->with('success', 'Status product berhasil diubah');
}

}