@extends('admin.layouts.app')

@section('title', 'Tambah Page')
@section('page_title', 'Tambah Page')

@section('content')

<form method="POST"
      action="{{ route('admin.page.store') }}"
      enctype="multipart/form-data"
      class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6 space-y-5">

    @csrf

    <div>
        <label class="text-sm text-gray-600">Judul Page</label>
        <input type="text"
               name="page_judul"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Content</label>
        <textarea name="page_content"
                  rows="8"
                  class="w-full p-3 rounded-xl border border-pink-100"></textarea>
    </div>

    <div>
        <label class="text-sm text-gray-600">Thumbnail</label>
        <input type="file"
               name="page_thumbnail"
               class="w-full p-3 rounded-xl border border-pink-100 bg-white">
    </div>

    <div>
        <label class="text-sm text-gray-600">Meta Title</label>
        <input type="text"
               name="page_meta_title"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Meta Description</label>
        <textarea name="page_meta_description"
                  rows="3"
                  class="w-full p-3 rounded-xl border border-pink-100"></textarea>
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="page_is_active"
               value="1"
               checked>
        <span>Active</span>
    </label>

    <button class="bg-pink-500 text-white px-6 py-2 rounded-xl">
        Simpan Page
    </button>

</form>

@endsection