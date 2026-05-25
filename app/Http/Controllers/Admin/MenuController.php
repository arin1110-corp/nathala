<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $data = ModelMenu::orderBy('menu_sort_order')->get();
        return view('admin.menu.index', compact('data'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_nama' => 'required|max:255',
        ]);

        ModelMenu::create([
            'menu_nama' => $request->menu_nama,
            'menu_url' => $request->menu_url,
            'menu_target' => $request->menu_target ?? '_self',
            'menu_sort_order' => $request->menu_sort_order ?? 0,
            'menu_is_active' => $request->has('menu_is_active'),
        ]);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = ModelMenu::findOrFail($id);
        return view('admin.menu.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ModelMenu::findOrFail($id);

        $request->validate([
            'menu_nama' => 'required|max:255',
        ]);

        $item->update([
            'menu_nama' => $request->menu_nama,
            'menu_url' => $request->menu_url,
            'menu_target' => $request->menu_target ?? '_self',
            'menu_sort_order' => $request->menu_sort_order ?? 0,
            'menu_is_active' => $request->has('menu_is_active'),
        ]);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil diupdate');
    }

    public function toggleStatus($id)
    {
        $item = ModelMenu::findOrFail($id);

        $item->update([
            'menu_is_active' => !$item->menu_is_active,
        ]);

        return back()->with('success', 'Status menu berhasil diubah');
    }

    public function destroy($id)
    {
        ModelMenu::findOrFail($id)->delete();

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil dihapus');
    }
}