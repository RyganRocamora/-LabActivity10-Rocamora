@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4">

    <!-- Hero Title Banner -->
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Barangay Bulletin</h1>
        <p class="text-slate-600 text-sm mt-1">Official announcements, health updates, and community news for Purok Rocamora.</p>
    </div>

    <!-- Filter & Search Form -->
    <form method="GET" action="{{ route('posts.index') }}" class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row gap-3 mb-8">
        <div class="flex-1">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search announcement title..." class="w-full px-3.5 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:border-transparent">
        </div>
        <div class="w-full sm:w-48">
            <select name="category" class="w-full px-3.5 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:border-transparent bg-white">
                <option value="">All Categories</option>
                @foreach ($categories as $c)
                    <option value="{{ $c }}" {{ request('category') === $c ? 'selected' : '' }}>{{ $c }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="w-full sm:w-auto px-5 py-2 bg-emerald-700 hover:bg-emerald-800 text-white font-medium text-sm rounded-lg transition shadow-sm">
                Filter
            </button>
            @if(request('q') || request('category'))
                <a href="{{ route('posts.index') }}" class="w-full sm:w-auto px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 text-center font-medium text-sm rounded-lg transition">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <!-- Post Cards Grid -->
    <div class="space-y-4">
        @forelse ($posts as $post)
            <article class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition relative {{ $post->is_pinned ? 'ring-2 ring-emerald-600/40 bg-emerald-50/20' : '' }}">
                
                <!-- Category Badges and Metadata -->
                <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-md">
                            {{ $post->category }}
                        </span>
                        @if ($post->is_pinned)
                            <span class="text-xs font-bold px-2.5 py-1 bg-rose-600 text-white rounded-md tracking-wider uppercase shadow-sm">
                                Pinned
                            </span>
                        @endif
                    </div>
                    <span class="text-xs text-slate-500 font-mono">
                        {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}
                    </span>
                </div>

                <!-- Post Title Link -->
                <h2 class="text-xl font-bold text-slate-900 mb-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:text-emerald-700 transition">
                        {{ $post->title }}
                    </a>
                </h2>

                <!-- Post Body Preview -->
                <p class="text-slate-600 text-sm line-clamp-2 leading-relaxed mb-4">
                    {{ Str::limit($post->body, 160) }}
                </p>

                <!-- Footer Details -->
                <div class="pt-3 border-t border-slate-100 flex justify-between items-center text-xs text-slate-500">
                    <span>Author ID: <strong class="text-slate-700 font-mono">#{{ $post->author_id }}</strong></span>
                    <span>Views: <strong class="text-slate-700 font-mono">{{ $post->views }}</strong></span>
                </div>
            </article>
        @empty
            <div class="bg-white p-12 text-center rounded-xl border border-slate-200 shadow-sm">
                <p class="text-slate-500 text-lg font-medium">No posts match your search.</p>
                <a href="{{ route('posts.index') }}" class="inline-block mt-3 text-sm text-emerald-700 hover:underline font-semibold">
                    Clear filters and view all announcements
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination Footer -->
    <div class="mt-8 bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
        {{ $posts->links() }}
        <p class="text-xs text-slate-500 text-center mt-3 border-t border-slate-100 pt-3">
            Showing <strong class="text-slate-700 font-mono">{{ $posts->firstItem() ?? 0 }}</strong> to <strong class="text-slate-700 font-mono">{{ $posts->lastItem() ?? 0 }}</strong> of <strong class="text-slate-700 font-mono">{{ $posts->total() }}</strong> posts
        </p>
    </div>

</div>
@endsection