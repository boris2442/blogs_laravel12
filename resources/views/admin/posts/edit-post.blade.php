@extends('layouts.admin.layout-admin')
@section('title', 'Editer un post')
@section('content')
<section>
    <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    Editer le post
                </h1>

                <div class="flex flex-col mb-6">
                    <label for="title">Titre de l'article</label>
                    <input name="title" value="{{ old('title', $post->title) }}" />
                    @error('title')
                    <span class='text-red-400'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex-col flex mb-6">
                    <label for="slug">Slug de l'article</label>
                    <input name="slug" value="{{ old('slug', $post->slug) }}" />
                    @error('slug')
                    <span class='text-red-400'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex-col flex mb-6">
                    <label for="content">Contenu du post</label>
                    <textarea name="content" id='content'>{{ old('content', $post->content) }}</textarea>
                </div>

                {{-- <div class="flex flex-col mb-6">
                    <label for="thumbnail">Image de couverture</label>
                    <input name="thumbnail" type="file" id='thumbnail' />
                    @if(image_exists($post->thumbnail))
                    <img src="{{ str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}"
                        alt="Image de {{ $post->title }}" class="mt-2 w-32 h-32 object-cover">
                    @endif
                </div> --}}
                <div class="flex flex-col mb-6">
                    <label for="thumbnail">Image de couverture</label>
                    <input name="thumbnail" type="file" id='thumbnail' />

                    @php
                    use Illuminate\Support\Facades\Storage;
                    @endphp

                    @if(Storage::exists($post->thumbnail))
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Image de {{ $post->title }}"
                        class="mt-2 w-32 h-32 object-cover">
                    @endif
                </div>

                <div class="flex flex-col mb-8">
                    <label for="category_id">Catégorie</label>
                    <select name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col mb-8">
                    <label for="tags_ids">Etiquettes</label>
                    <select name="tags_ids[]" id='tags_ids' multiple>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enregistrer
                    </button>
                    <a href="{{ route('admin.posts.index') }}" class="text-sm font-semibold text-gray-900">Annuler</a>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection