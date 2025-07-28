@extends('layouts.admin.layout-admin')

@section('title', 'Accueil du blog côté admin')

@section('content')
<section class="py-8 px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#111827] min-h-screen">
    <div class="sm:flex sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Utilisateurs</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Gérez ici les utilisateurs.</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.users.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 dark:bg-green-600 dark:hover:bg-green-700 transition">
                + Créer un utilisateur
            </a>
        </div>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Nom</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-[#1F2937] divide-y divide-gray-100 dark:divide-gray-700">
                @foreach ($users as $user)
                <tr class="hover:bg-gray-50 dark:hover:bg-[#2D3748] transition">
                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                        {{ $user->id }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                        {{ $user->email }}
                    </td>
                    {{-- <td class="whitespace-nowrap px-6 py-4 text-sm">

                    </td> --}}
                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 dark:text-red-400 hover:underline">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</section>
@endsection