@extends('layouts.admin.layout-admin')

@section('title', 'admin add post or article')

@section('content')
<section class="py-10 px-4 sm:px-8 lg:px-12 bg-white dark:bg-[#111827] min-h-screen">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-4xl mx-auto space-y-8 bg-white dark:bg-[#1F2937] p-6 rounded-xl shadow-md dark:shadow-none ring-1 ring-gray-200 dark:ring-gray-700">
        @csrf

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Créer un post</h1>

        <div class="flex flex-col gap-4">
            <label for="title" class="text-sm text-gray-700 dark:text-gray-300">Titre de l'article</label>
            <input name="title" value="{{ old('title') }}"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            @error('title')
            <span class='text-sm text-red-500'>{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col gap-4">
            <label for="slug" class="text-sm text-gray-700 dark:text-gray-300">Slug de l'article</label>
            <input name="slug" value="{{ old('slug') }}"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            @error('slug')
            <span class='text-sm text-red-500'>{{ $message }}</span>
            @enderror
            <span class="text-xs text-gray-500 dark:text-gray-400">Laisser vide pour un slug auto. Si une valeur est renseignée, elle sera slugifiée avant d'être soumise à validation.</span>
        </div>

        <div class="flex flex-col gap-4">
            <label for="content" class="text-sm text-gray-700 dark:text-gray-300">Contenu du post</label>
            <textarea name="content" id="content" rows="10"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content') }}</textarea>
        </div>

        <div class="flex flex-col gap-4">
            <label for="thumbnail" class="text-sm text-gray-700 dark:text-gray-300">Image de couverture</label>
            <input name="thumbnail" type="file" id="thumbnail"
                class="dark:text-white text-sm file:mr-4 file:py-2 file:px-4 file:border file:rounded file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
        </div>

        <div class="flex flex-col gap-4">
            <label for="category_id" class="text-sm text-gray-700 dark:text-gray-300">Catégorie</label>
            <select name="category_id"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-4">
            <label for="etiquettes" class="text-sm text-gray-700 dark:text-gray-300">Étiquettes</label>
            <select name="tag_ids" id="etiquettes"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Publier
            </button>
        </div>
    </form>
</section>
@endsection
