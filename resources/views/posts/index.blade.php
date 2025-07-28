@extends('layouts.users.layout-user')
@section('title', 'Accueil du blog')
@section('content')
<div
    class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 min-h-screen transition-colors duration-300 bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
    <header class="flex justify-between items-center py-6 space-x-5">
        <a href="{{ route('posts.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 text-gray-900 dark:text-gray-100">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>
        </a>

        <form action="{{ route('posts.index') }}"
            class="flex items-center border-b border-gray-400 dark:border-gray-100 focus-within:border-blue-500 w-full max-w-md">
            <input id="search" value="{{ request()->search }}"
                class="px-3 py-2 w-full bg-transparent text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-300 focus:outline-none"
                type="search" name="search" placeholder="Rechercher un article">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5 text-gray-900 dark:text-gray-100">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </form>

        @include('components.dashboard.navigation')

    </header>

    <main class="mt-12">
        <div class="space-y-14">
            @forelse($posts as $post)
            <article class="flex flex-col lg:flex-row gap-8 pb-14 border-b border-gray-200 dark:border-gray-700">
                <div class="lg:w-5/12">
                    <img class="w-full h-64 object-cover rounded-2xl"
                        src="{{ str_starts_with($post->thubbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}"
                        alt="Image de l'article {{ $post->title }}">
                </div>
                <div class="flex flex-col justify-between lg:w-7/12 space-y-5">
                    @if($post->category)
                    <a href="{{ route('posts.category', ['category'=>$post->category]) }}"
                        class="text-lg font-semibold text-gray-900 dark:text-gray-100 underline">{{
                        $post->category->name }}</a>
                    @endif
                    <h2 class="text-3xl lg:text-5xl font-bold leading-tight text-gray-900 dark:text-gray-100">{{
                        $post->title }}</h2>
                    @if ($post->tags->count() > 0)
                    <ul class="flex flex-wrap gap-2">
                        @foreach ($post->tags as $tag)
                        <li><a href="{{ route('posts.tag',['tag'=>$tag]) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded-full text-sm hover:bg-blue-600">{{
                                $tag->name }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    <p class="text-base text-gray-600 dark:text-gray-300">{{ $post->excerpt }}</p>
                    <a href="{{ route('posts.show',['post'=> $post->slug]) }}"
                        class="flex items-center gap-2 px-4 py-1 text-white font-semibold bg-gray-900 hover:bg-blue-500 dark:bg-emerald-500 dark:hover:bg-emerald-600 rounded-full transition max-w-[130px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        Voir plus
                    </a>
                </div>
            </article>
            @empty
            <p class="text-center text-gray-400 dark:text-gray-300">Aucun article trouvé.</p>
            @endforelse
        </div>
    </main>
</div>
@endsection
