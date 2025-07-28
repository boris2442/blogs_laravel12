@extends('layouts.users.layout-user')
@section('title', 'Accueil du blog')
@section('content')
<div
    class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 min-h-screen transition-colors duration-300">
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

    <main class="mt-12 space-y-16">
        <article class="flex flex-col lg:flex-row gap-8 pb-14 border-b border-gray-200 dark:border-gray-700">
            <div class="lg:w-5/12">
                <img class="w-full h-64 object-cover rounded-2xl"
                    src="{{ str_starts_with($post->thubbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}"
                    alt="Image de l'article {{ $post->title }}">
            </div>
            <div class="flex flex-col justify-between lg:w-7/12 space-y-5">
                @if($post->category)
                <a href="{{ route('posts.category', ['category'=>$post->category]) }}"
                    class="text-lg font-semibold text-gray-900 dark:text-gray-100 underline">{{ $post->category->name
                    }}</a>
                @endif
                <h2 class="text-3xl lg:text-5xl font-bold leading-tight text-gray-900 dark:text-gray-100">{{
                    $post->title }}</h2>
                @if ($post->tags->count() > 0)
                <ul class="flex flex-wrap gap-2">
                    @foreach ($post->tags as $tag)
                    <li>
                        <a href="{{ route('posts.tag',['tag'=>$tag]) }}"
                            class="px-3 py-1 bg-blue-500 text-white rounded-full text-sm hover:bg-blue-600">
                            {{ $tag->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
                <p class="text-base text-gray-600 dark:text-gray-300">{{ $post->excerpt }}</p>
                <p class="text-base text-gray-600 dark:text-gray-300">{!! nl2br(e($post->content)) !!}</p>
            </div>
        </article>

        {{-- Formulaire commentaire stylé --}}
        <div class="mt-10">
            @auth
            <form class="w-full max-w-2xl mx-auto mt-8" action="{{ route('posts.comment', ['post'=>$post]) }}"
                method="post">
                @csrf
                <div class="relative">
                    <textarea name="content" id="content" rows="3"
                        class="peer w-full resize-none rounded-xl bg-white dark:bg-gray-800 px-4 pt-4 pb-10 text-sm text-gray-900 dark:text-gray-100 placeholder-transparent border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out"
                        placeholder="Ajouter un commentaire..."
                        oninput="this.style.height='auto'; this.style.height = this.scrollHeight + 'px';">{{ old('content') }}</textarea>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="flex items-center gap-2 text-white bg-blue-500 hover:bg-blue-600 dark:bg-emerald-500 dark:hover:bg-emerald-600 px-5 py-2 rounded-full transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6-6m6 6l-6 6" />
                        </svg>
                        Envoyer
                    </button>
                </div>
            </form>
            @endauth

            <div class="space-y-8 mt-8">
                @forelse($post->comments as $comment)
                <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg relative">
                    <p class="text-sm text-gray-900 dark:text-gray-100">{{ $comment->content }}</p>
                    <div class="mt-2 text-xs text-gray-500 dark:text-gray-400 ml-10"
                        style="margin-left: 2rem; padding-left: 1rem; border-left: 2px solid #3B82F6; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-top: 0.5rem; margin-bottom: 0.5rem;">
                        Posté par {{ $comment->user->name }} le {{ $comment->created_at->format('d/m/Y H:i:s') }}
                    </div>
                    <img src="{{ Gravatar::avatar($comment->user->email) }}" alt="image de {{ $comment->user->name }}"
                        class="w-8 h-8 rounded-full mt-2 object-cover absolute top-10 left-2">
                </div>
                @empty
                <p class="text-center text-gray-400 dark:text-gray-300">Aucun commentaire pour cet article.</p>
                @endforelse
            </div>
        </div>
    </main>
</div>
@endsection