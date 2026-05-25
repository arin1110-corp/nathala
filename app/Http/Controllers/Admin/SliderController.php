<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelSlider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $data = ModelSlider::latest()->get();
        return view('admin.slider.index', compact('data'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slider_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'slider_judul' => 'nullable|max:255',
        ]);

        $imagePath = null;

        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slider'), $filename);
            $imagePath = 'uploads/slider/' . $filename;
        }

        $mobilePath = null;

        if ($request->hasFile('slider_image_mobile')) {
            $file = $request->file('slider_image_mobile');
            $filename = time() . '_mobile_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slider'), $filename);
            $mobilePath = 'uploads/slider/' . $filename;
        }

        ModelSlider::create([
            'slider_nama' => $request->slider_nama,
            'slider_judul' => $request->slider_judul,
            'slider_deskripsi' => $request->slider_deskripsi,
            'slider_image' => $imagePath,
            'slider_image_mobile' => $mobilePath,
            'slider_link' => $request->slider_link,
            'slider_button_text' => $request->slider_button_text,
            'slider_posisi' => $request->slider_posisi ?? 'home',
            'slider_sort_order' => $request->slider_sort_order ?? 0,
            'slider_is_active' => $request->has('slider_is_active'),
            'slider_mulai' => $request->slider_mulai,
            'slider_selesai' => $request->slider_selesai,
            'slider_alt_text' => $request->slider_alt_text,
            'slider_tipe' => $request->slider_tipe ?? 'image',
            'slider_video_url' => $request->slider_video_url,
        ]);

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = ModelSlider::findOrFail($id);
        return view('admin.slider.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ModelSlider::findOrFail($id);

        $request->validate([
            'slider_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'slider_image_mobile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('slider_image')) {
            if ($item->slider_image && file_exists(public_path($item->slider_image))) {
                unlink(public_path($item->slider_image));
            }

            $file = $request->file('slider_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slider'), $filename);
            $item->slider_image = 'uploads/slider/' . $filename;
        }

        if ($request->hasFile('slider_image_mobile')) {
            if ($item->slider_image_mobile && file_exists(public_path($item->slider_image_mobile))) {
                unlink(public_path($item->slider_image_mobile));
            }

            $file = $request->file('slider_image_mobile');
            $filename = time() . '_mobile_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slider'), $filename);
            $item->slider_image_mobile = 'uploads/slider/' . $filename;
        }

        $item->update([
            'slider_nama' => $request->slider_nama,
            'slider_judul' => $request->slider_judul,
            'slider_deskripsi' => $request->slider_deskripsi,
            'slider_link' => $request->slider_link,
            'slider_button_text' => $request->slider_button_text,
            'slider_posisi' => $request->slider_posisi ?? 'home',
            'slider_sort_order' => $request->slider_sort_order ?? 0,
            'slider_is_active' => $request->has('slider_is_active'),
            'slider_mulai' => $request->slider_mulai,
            'slider_selesai' => $request->slider_selesai,
            'slider_alt_text' => $request->slider_alt_text,
            'slider_tipe' => $request->slider_tipe ?? 'image',
            'slider_video_url' => $request->slider_video_url,
        ]);

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider berhasil diupdate');
    }

    public function toggleStatus($id)
    {
        $item = ModelSlider::findOrFail($id);

        $item->update([
            'slider_is_active' => !$item->slider_is_active,
        ]);

        return back()->with('success', 'Status slider berhasil diubah');
    }

    public function destroy($id)
    {
        $item = ModelSlider::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider berhasil dihapus');
    }
}