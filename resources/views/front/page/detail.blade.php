@extends('front.layouts.app')

@section('meta_title', $page->page_meta_title ?? $page->page_judul)
@section('meta_description', $page->page_meta_description ?? Str::limit(strip_tags($page->page_content), 160))

@section('content')

<section class="max-w-4xl mx-auto px-4 py-10">

    <div class="bg-white/70 border border-slate-100 rounded-[32px] p-8 shadow-xl">

        @if($page->page_thumbnail)
            <img src="{{ asset($page->page_thumbnail) }}"
                 class="w-full h-72 object-cover rounded-[24px] mb-8">
        @endif

        <h1 class="text-3xl md:text-5xl font-bold mb-6 theme-primary-text">
            {{ $page->page_judul }}
        </h1>

        <div class="max-w-none text-slate-600 leading-relaxed space-y-4">
            {!! nl2br(e($page->page_content)) !!}
        </div>

    </div>

</section>

@endsection