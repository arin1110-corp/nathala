<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $data = ModelPage::latest()->get();
        return view('admin.page.index', compact('data'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_judul' => 'required|max:255',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('page_thumbnail')) {
            $file = $request->file('page_thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/page'), $filename);
            $thumbnailPath = 'uploads/page/' . $filename;
        }

        ModelPage::create([
            'page_judul' => $request->page_judul,
            'page_slug' => Str::slug($request->page_judul),
            'page_content' => $request->page_content,
            'page_thumbnail' => $thumbnailPath,
            'page_meta_title' => $request->page_meta_title,
            'page_meta_description' => $request->page_meta_description,
            'page_is_active' => $request->has('page_is_active'),
        ]);

        return redirect()->route('admin.page.index')
            ->with('success', 'Page berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = ModelPage::findOrFail($id);
        return view('admin.page.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ModelPage::findOrFail($id);

        $request->validate([
            'page_judul' => 'required|max:255',
        ]);

        if ($request->hasFile('page_thumbnail')) {
            $file = $request->file('page_thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/page'), $filename);
            $item->page_thumbnail = 'uploads/page/' . $filename;
        }

        $item->update([
            'page_judul' => $request->page_judul,
            'page_slug' => Str::slug($request->page_judul),
            'page_content' => $request->page_content,
            'page_meta_title' => $request->page_meta_title,
            'page_meta_description' => $request->page_meta_description,
            'page_is_active' => $request->has('page_is_active'),
        ]);

        return redirect()->route('admin.page.index')
            ->with('success', 'Page berhasil diupdate');
    }

    public function toggleStatus($id)
    {
        $item = ModelPage::findOrFail($id);

        $item->update([
            'page_is_active' => !$item->page_is_active,
        ]);

        return back()->with('success', 'Status page berhasil diubah');
    }

    public function destroy($id)
    {
        ModelPage::findOrFail($id)->delete();

        return redirect()->route('admin.page.index')
            ->with('success', 'Page berhasil dihapus');
    }
}