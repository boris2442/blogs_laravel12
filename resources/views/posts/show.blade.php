@extends('layouts.users.layout-user')
@section('title', 'Accueil du blog')
@section('content')
<div
    class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 bg-[#FAF9F6] text-[#111827] dark:bg-[#1E2A38] dark:text-[#F4F4F5] min-h-screen transition-colors duration-300">
    <header class="flex justify-between items-center py-6 space-x-5">
        <a href="{{ route('posts.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 text-[#1E2A38] dark:text-[#F4F4F5]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>
        </a>

        <form action="{{ route('posts.index') }}"
            class="flex items-center border-b border-[#9CA3AF] dark:border-[#F4F4F5] focus-within:border-[#3B82F6] w-full max-w-md">
            <input id="search" value="{{ request()->search }}"
                class="px-3 py-2 w-full bg-transparent text-[#111827] dark:text-[#F4F4F5] placeholder-[#9CA3AF] dark:placeholder-[#D1D5DB] focus:outline-none"
                type="search" name="search" placeholder="Rechercher un article">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5 text-[#1E2A38] dark:text-[#F4F4F5]">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </form>

      @include('components.dashboard.navigation')
    </header>

    <main class="mt-12 space-y-16">
        {{-- @forelse($posts as $post) --}}
        <article class="flex flex-col lg:flex-row gap-8 pb-14 border-b border-[#E5E7EB] dark:border-[#374151]">
            <div class="lg:w-5/12">
                <img class="w-full h-64 object-cover rounded-2xl"
                    src="{{ str_starts_with($post->thubbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}"
                    alt="Image de l'article {{ $post->title }}">
            </div>
            <div class="flex flex-col justify-between lg:w-7/12 space-y-5">
                @if($post->category)
                <a href="{{ route('posts.category', ['category'=>$post->category]) }}"
                    class="text-lg font-semibold text-[#1E2A38] dark:text-[#F4F4F5] underline">{{ $post->category->name
                    }}</a>
                @endif
                <h2 class="text-3xl lg:text-5xl font-bold leading-tight text-[#1E2A38] dark:text-[#F4F4F5]">{{
                    $post->title }}</h2>
                @if ($post->tags->count() > 0)
                <ul class="flex flex-wrap gap-2">
                    @foreach ($post->tags as $tag)
                    <li><a href="{{ route('posts.tag',['tag'=>$tag]) }}"
                            class="px-3 py-1 bg-[#3B82F6] text-white rounded-full text-sm hover:bg-[#2563EB]">{{
                            $tag->name }}</a></li>
                    @endforeach
                </ul>
                @endif
                <p class="text-base text-[#4B5563] dark:text-[#D1D5DB]">{{ $post->excerpt }}</p>
                {{-- <a href="{{ route('posts.show',['post'=> $post->slug]) }}"
                    class="inline-flex items-center gap-2 px-6 py-3 text-white font-semibold bg-[#1E2A38] hover:bg-[#3B82F6] dark:bg-[#10B981] dark:hover:bg-[#059669] rounded-full transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                    Lire l'article
                </a> --}}
                <p class="text-base text-[#4B5563] dark:text-[#D1D5DB]"> {!!nl2br(e($post->content)) !!}</p>
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
                        class="peer w-full resize-none rounded-xl bg-white dark:bg-[#1F2937] px-4 pt-4 pb-10 text-sm text-[#111827] dark:text-[#F4F4F5] placeholder-transparent border border-[#D1D5DB] dark:border-[#374151] focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-all duration-300 ease-in-out"
                        placeholder="Ajouter un commentaire..."
                        oninput="this.style.height='auto'; this.style.height = this.scrollHeight + 'px';">{{ old('content') }}</textarea>
                    {{-- <label for="content"
                        class="absolute left-4 top-2 text-xs text-[#9CA3AF] dark:text-[#D1D5DB] peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:text-[#6B7280] peer-placeholder-shown:dark:text-[#9CA3AF] transition-all duration-300 ease-in-out">
                        Ajouter un commentaire
                    </label> --}}
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="flex items-center gap-2 text-white bg-[#3B82F6] hover:bg-[#2563EB] dark:bg-[#10B981] dark:hover:bg-[#059669] px-5 py-2 rounded-full transition">
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
                <div class="bg-[#F9FAFB] dark:bg-[#1F2937] p-4 rounded-lg relative">
                    <p class="text-sm text-[#1E2A38] dark:text-[#F4F4F5]">{{ $comment->content }}</p>
                    <div class="mt-2 text-xs text-[#6B7280] dark:text-[#9CA3AF] 
                     ml-10" style="margin-left: 2rem; padding-left: 1rem; border-left: 2px solid #3B82F6; 
                        padding-top: 0.5rem; padding-bottom: 0.5rem; margin-top: 0.5rem; margin-bottom: 0.5rem;
                    ">
                        Posté par {{ $comment->user->name }} le {{ $comment->created_at->format('d/m/Y H:i:s') }}
                    </div>
                    <img src="{{ Gravatar::avatar($comment->user->email) }}" alt="image de {{ $comment->user->name }}"
                        class="w-8 h-8 rounded-full mt-2 object-cover absolute top-10 left-2">
                </div>
                @empty
                <p class="text-center text-[#9CA3AF] dark:text-[#D1D5DB]">Aucun commentaire pour cet article.</p>

                @endforelse
            </div>
        </div>
        {{-- @empty
        <p class="text-center text-[#9CA3AF] dark:text-[#D1D5DB]">Aucun article trouvé.</p>
        @endforelse --}}
    </main>
</div>
@endsection