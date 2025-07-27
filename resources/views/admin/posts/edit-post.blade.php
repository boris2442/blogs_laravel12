@extends('layouts.admin.layout-admin')

@section('title', 'Editer un post')

@section('content')
<section class="py-10 px-4 sm:px-8 lg:px-12 bg-white dark:bg-[#111827] min-h-screen">
    <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data"
        class="max-w-4xl mx-auto space-y-8 bg-white dark:bg-[#1F2937] p-6 rounded-xl shadow-md dark:shadow-none ring-1 ring-gray-200 dark:ring-gray-700">
        @csrf
        @method('PUT')

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Éditer le post</h1>

        <div class="flex flex-col gap-4">
            <label class="text-sm text-gray-700 dark:text-gray-300" for="title">Titre de l'article</label>
            <input name="title" value="{{ old('title', $post->title) }}"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            @error('title')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col gap-4">
            <label class="text-sm text-gray-700 dark:text-gray-300" for="slug">Slug de l'article</label>
            <input name="slug" value="{{ old('slug', $post->slug) }}"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            @error('slug')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col gap-4">
            <label class="text-sm text-gray-700 dark:text-gray-300" for="content">Contenu du post</label>
            <textarea name="content" id="content" rows="10"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="flex flex-col gap-4">
            <label class="text-sm text-gray-700 dark:text-gray-300" for="thumbnail">Image de couverture</label>
            <input name="thumbnail" type="file" id="thumbnail"
                class="dark:text-white text-sm file:mr-4 file:py-2 file:px-4 file:border file:rounded file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            @php use Illuminate\Support\Facades\Storage; @endphp
            @if(Storage::exists($post->thumbnail))
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Image de {{ $post->title }}"
                class="mt-2 w-32 h-32 rounded object-cover ring-1 ring-gray-300 dark:ring-gray-600" />
            @endif
        </div>

        <div class="flex flex-col gap-4">
            <label class="text-sm text-gray-700 dark:text-gray-300" for="category_id">Catégorie</label>
            <select name="category_id"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-4">
            <label class="text-sm text-gray-700 dark:text-gray-300" for="tags_ids">Étiquettes</label>
            <select name="tags_ids[]" id="tags_ids" multiple
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mt-6 flex items-center justify-between">
            <a href="{{ route('admin.posts.index') }}"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline">Annuler</a>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enregistrer
            </button>
        </div>
    </form>
</section>
@endsection
