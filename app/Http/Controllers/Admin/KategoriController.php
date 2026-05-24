<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data = ModelKategori::latest()->get();
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_nama' => 'required|max:255',
        ]);

        // SLUG SAFE (anti duplicate ringan)
        $slug = Str::slug($request->kategori_nama);

        // THUMBNAIL
        $thumbnailPath = null;
        if ($request->hasFile('kategori_thumbnail')) {
            $file = $request->file('kategori_thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/kategori'), $filename);
            $thumbnailPath = 'uploads/kategori/' . $filename;
        }

        ModelKategori::create([
            'kategori_nama' => $request->kategori_nama,
            'kategori_slug' => $slug,
            'kategori_deskripsi' => $request->kategori_deskripsi,

            'kategori_thumbnail' => $thumbnailPath,

            'kategori_is_active' => true,
            'kategori_is_featured' => $request->has('kategori_is_featured'),
            'kategori_is_visible' => $request->has('kategori_is_visible'),

            'kategori_meta_title' => $request->kategori_meta_title,
            'kategori_meta_description' => $request->kategori_meta_description,

            'kategori_sort_order' => $request->kategori_sort_order ?? 0,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = ModelKategori::findOrFail($id);
        return view('admin.kategori.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ModelKategori::findOrFail($id);

        $request->validate([
            'kategori_nama' => 'required|max:255',
        ]);

        $slug = Str::slug($request->kategori_nama);

        // THUMBNAIL UPDATE (optional replace)
        if ($request->hasFile('kategori_thumbnail')) {
            $file = $request->file('kategori_thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/kategori'), $filename);
            $item->kategori_thumbnail = 'uploads/kategori/' . $filename;
        }

        $item->update([
            'kategori_nama' => $request->kategori_nama,
            'kategori_slug' => $slug,
            'kategori_deskripsi' => $request->kategori_deskripsi,

            'kategori_is_featured' => $request->has('kategori_is_featured'),
            'kategori_is_visible' => $request->has('kategori_is_visible'),

            'kategori_meta_title' => $request->kategori_meta_title,
            'kategori_meta_description' => $request->kategori_meta_description,

            'kategori_sort_order' => $request->kategori_sort_order ?? 0,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = ModelKategori::findOrFail($id);

        // lebih aman daripada delete total
        $item->update([
            'kategori_is_active' => false,
            'kategori_is_visible' => false,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori dinonaktifkan');
    }
    public function toggleStatus($id)
    {
        $item = ModelKategori::findOrFail($id);

        $item->kategori_is_active = !$item->kategori_is_active;
        $item->save();

        return redirect()->back()->with('success', 'Status kategori diupdate');
    }
}