@extends('admin.layouts.app')

@section('title', 'Pages')
@section('page_title', 'Pages')

@section('content')

<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Pages</h1>

    <a href="{{ route('admin.page.create') }}"
       class="bg-pink-500 text-white px-4 py-2 rounded-2xl">
        + Tambah Page
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-4 overflow-x-auto">

    <table id="pageTable" class="w-full text-sm">

        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Thumbnail</th>
                <th class="p-3">Judul</th>
                <th class="p-3">Slug</th>
                <th class="p-3">Status</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($data as $item)
                <tr class="border-b hover:bg-pink-50/30">

                    <td class="p-3">
                        @if($item->page_thumbnail)
                            <img src="{{ asset($item->page_thumbnail) }}"
                                 class="w-14 h-14 rounded-xl object-cover">
                        @else
                            <div class="w-14 h-14 bg-pink-100 rounded-xl"></div>
                        @endif
                    </td>

                    <td class="p-3 font-medium">
                        {{ $item->page_judul }}
                    </td>

                    <td class="p-3 text-gray-500">
                        {{ $item->page_slug }}
                    </td>

                    <td class="p-3">
                        @if($item->page_is_active)
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-xl">
                                Active
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-xl">
                                Inactive
                            </span>
                        @endif
                    </td>

                    <td class="p-3 flex gap-2">

                        <a href="{{ route('admin.page.edit', $item->page_id) }}"
                           class="px-3 py-1 bg-blue-100 text-blue-600 rounded-xl text-xs">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('admin.page.toggle', $item->page_id) }}">
                            @csrf
                            @method('PATCH')

                            @if($item->page_is_active)
                                <button class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-xl text-xs">
                                    Nonaktifkan
                                </button>
                            @else
                                <button class="px-3 py-1 bg-green-100 text-green-600 rounded-xl text-xs">
                                    Aktifkan
                                </button>
                            @endif
                        </form>

                        <form method="POST" action="{{ route('admin.page.destroy', $item->page_id) }}">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus page ini?')"
                                    class="px-3 py-1 bg-red-100 text-red-600 rounded-xl text-xs">
                                Hapus
                            </button>
                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

</div>

@endsection

@push('scripts')
<script>
    $(function () {
        if (!$.fn.DataTable.isDataTable('#pageTable')) {
            $('#pageTable').DataTable({
                pageLength: 10
            });
        }
    });
</script>
@endpush