@extends('layouts.admin.layout-admin')

@section('title', 'admin user')

@section('content')
<section class="py-10 px-4 sm:px-8 lg:px-12 bg-white dark:bg-[#111827] min-h-screen">
    <form action="{{ route('admin.users.store') }}" method="POST" 
        class="max-w-4xl mx-auto space-y-8 bg-white dark:bg-[#1F2937] p-6 rounded-xl shadow-md dark:shadow-none ring-1 ring-gray-200 dark:ring-gray-700">
        @csrf

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Créer un utilisateur</h1>

        <div class="flex flex-col gap-4">
            <label for="name" class="text-sm text-gray-700 dark:text-gray-300">Nom</label>
            <input name="name" value="{{ old('name') }}"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            @error('name')
            <span class='text-sm text-red-500'>{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col gap-4">
            <label for="email" class="text-sm text-gray-700 dark:text-gray-300">Email</label>
            <input name="email" value="{{ old('email') }}"
                class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            @error('email')
            <span class='text-sm text-red-500'>{{ $message }}</span>
            @enderror

        </div>


        <div class="flex flex-col gap-4">
            <label for="password" class="text-sm text-gray-700 dark:text-gray-300">Password</label>
            <input name="password" type="password" id="password"
                class="dark:text-white text-sm file:mr-4 file:py-2 file:px-4 file:border file:rounded file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                 @error('password')
            <span class='text-sm text-red-500'>{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Ajouter
            </button>
        </div>
    </form>
</section>
@endsection