@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4">

    <!-- Back Button -->
    <a href="{{ route('posts.index') }}" class="inline-flex items-center text-sm text-emerald-700 hover:text-emerald-900 font-semibold mb-6 transition">
        &larr; Back to Bulletin Board
    </a>

    <!-- Single Post Card Container -->
    <article class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-md">
        
        <!-- Post Header Metadata -->
        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-4 mb-6">
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold px-3 py-1 bg-emerald-100 text-emerald-800 rounded-md">
                    {{ $post->category }}
                </span>
                @if ($post->is_pinned)
                    <span class="text-xs font-bold px-3 py-1 bg-rose-600 text-white rounded-md tracking-wider uppercase">
                        Pinned
                    </span>
                @endif
            </div>
            <div class="text-xs text-slate-500 font-mono space-x-3">
                <span>Published: {{ $post->published_at ? $post->published_at->format('F d, Y') : 'Draft' }}</span>
                <span>•</span>
                <span>Views: <strong class="text-slate-800 font-bold">{{ $post->views }}</strong></span>
            </div>
        </div>

        <!-- Full Title -->
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight leading-tight mb-6">
            {{ $post->title }}
        </h1>

        <!-- Full Announcement Text -->
        <div class="prose max-w-none text-slate-700 leading-relaxed space-y-4 mb-8 text-base">
            {!! nl2br(e($post->body)) !!}
        </div>

        <!-- Author Information Footer -->
        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 flex justify-between items-center text-xs text-slate-600">
            <div>
                <p class="font-medium text-slate-800">Barangay Matina Crossing Bulletin System</p>
                <p class="text-slate-500">Author ID: #{{ $post->author_id }}</p>
            </div>
            <span class="text-slate-400 font-mono">ID: {{ $post->id }}</span>
        </div>

    </article>
</div>
@endsection