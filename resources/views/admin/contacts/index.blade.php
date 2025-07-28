@extends('layouts.admin.layout-admin')

@section('title', 'Accueil du blog côté admin')

@section('content')
<section class="py-8 px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#111827] min-h-screen">
    <div class="sm:flex sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Messages</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Gérez ici les Messages.</p>
        </div>

    </div>

    <div class="overflow-x-auto rounded-lg shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3 text-right">Subject</th>
                    <th class="px-6 py-3 text-right">Message</th>
                    <th class="px-6 py-3 text-right">created_at</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-[#1F2937] divide-y divide-gray-100 dark:divide-gray-700">
                @foreach ($contacts as $contact)
                <tr class="hover:bg-gray-50 dark:hover:bg-[#2D3748] transition">
                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                        {{ $contact->id }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                        {{ $contact->name }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                        {{ $contact->email }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                        {{ $contact->subject }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                        {{ $contact->message }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                        {{ $contact->created_at }}
                    </td>
                    {{-- <td class="whitespace-nowrap px-6 py-4 text-sm">

                    </td> --}}
                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                        <form action="{{ route('admin.contacts.destroy', ['contact' => $contact]) }}" method="POST"
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
        {{ $contacts->links() }}
    </div>
</section>
@endsection