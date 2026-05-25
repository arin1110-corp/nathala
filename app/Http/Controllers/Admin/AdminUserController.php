<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = ModelAdmin::latest()->get();

        return view('admin.adminuser.index', compact('data'));
    }

    public function create()
    {
        return view('admin.adminuser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'admin_nama' => 'required|max:255',
            'admin_email' => 'required|email|unique:nathala_admin,admin_email',
            'admin_password' => 'required|min:6',
        ]);

        ModelAdmin::create([
            'admin_nama' => $request->admin_nama,
            'admin_email' => $request->admin_email,
            'admin_password' => Hash::make($request->admin_password),
            'admin_is_active' => $request->has('admin_is_active'),
        ]);

        return redirect()
            ->route('admin.adminuser.index')
            ->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = ModelAdmin::findOrFail($id);

        return view('admin.adminuser.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ModelAdmin::findOrFail($id);

        $request->validate([
            'admin_nama' => 'required|max:255',
            'admin_email' => 'required|email|unique:nathala_admin,admin_email,' . $id . ',admin_id',
        ]);

        $item->admin_nama = $request->admin_nama;
        $item->admin_email = $request->admin_email;
        $item->admin_is_active = $request->has('admin_is_active');

        if ($request->filled('admin_password')) {
            $item->admin_password = Hash::make($request->admin_password);
        }

        $item->save();

        return redirect()
            ->route('admin.adminuser.index')
            ->with('success', 'Admin berhasil diupdate');
    }

    public function toggleStatus($id)
    {
        $item = ModelAdmin::findOrFail($id);

        $item->update([
            'admin_is_active' => !$item->admin_is_active,
        ]);

        return back()->with('success', 'Status admin berhasil diubah');
    }

    public function destroy($id)
    {
        ModelAdmin::findOrFail($id)->delete();

        return redirect()
            ->route('admin.adminuser.index')
            ->with('success', 'Admin berhasil dihapus');
    }
}