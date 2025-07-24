@extends('layouts.admin.layout-admin')
@section('title', 'admin add post or article')
@section('content')
<section>
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    Créer un post
                </h1>
                {{-- <p class="mt-1 text-sm leading-6 text-gray-600">Révélons au Monde nos talents d'écrivains !</p>
                --}}

                {{-- <div class="mt-10 space-y-8 md:w-2/3"> --}}
                    <div class="flex flex-col mb-6">
                        <label for="Titre">titre de l'article</label>
                        <input name="title" value="{{ @old('title') }}" />
                        @error('title')
                        <span class='text-red-400'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex-col flex mb-6">
                        <label for="slug">slug de l'article</label>
                        <input name="slug" value="{{ @old('slug') }}" />
                        @error('slug')
                        <span class='text-red-400'>{{$message}}</span>
                        @enderror
                        <span>Laisser vide pour un slug auto. Si une valeur est renseignée, elle sera slugifiée avant
                            d'être
                            soumise à validation.</span>
                    </div>
                    <div class="flex-col flex">
                        <label for="content">Contenu du post</label>
                        <textarea name="content" id='content'>{{ @old('content') }}</textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="thumbnail">image de couverture</label>
                        <input name="thumbnail" type="file" value="$post->thumbnail" id='thumbnail' />
                    </div>
                    <div class="flex flex-col mb-8">
                        <label for="category_id">Category</label>
                        <select name="category_id" {{-- value="$post->category_id" --}}>
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col mb-8">
                        <label for="etiquettes">Etiquettes</label>
                        <select name="tag_ids" id='etiquettes'>
                            @foreach ($tags as $tag )
                            <option value="{{$tag->id}}">{{$tag->name}}</option>

                            @endforeach
                        </select>
                    </div>



                </div>
            </div>

            <div class="">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Publier
                </button>
            </div>
    </form>
</section>
@endsection