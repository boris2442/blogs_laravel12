@extends('layouts.website.app')
@section('title', 'Contactez-boris tech')

@section('content')
<div
    class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 py-12 bg-[#FAF9F6] dark:bg-[#1E2A38] text-[#111827] dark:text-[#F4F4F5]  transition-colors duration-300 rounded-lg shadow-md">

    <h1 class="text-4xl font-bold mb-8 text-center">Contactez BorisTech</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        {{-- Formulaire de contact --}}
        <form {{-- action="{{ route('contact.send') }}" --}} method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block mb-1 font-semibold">Nom complet</label>
                <input type="text" name="name" id="name" required
                    class="w-full rounded-md border border-gray-300 px-4 py-2 text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"
                    placeholder="Votre nom complet">
            </div>
            <div>
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full rounded-md border border-gray-300 px-4 py-2 text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"
                    placeholder="votre.email@example.com">
            </div>
            <div>
                <label for="subject" class="block mb-1 font-semibold">Sujet</label>
                <input type="text" name="subject" id="subject" required
                    class="w-full rounded-md border border-gray-300 px-4 py-2 text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"
                    placeholder="Sujet de votre message">
            </div>
            <div>
                <label for="message" class="block mb-1 font-semibold">Message</label>
                <textarea name="message" id="message" rows="5" required
                    class="w-full rounded-md border border-gray-300 px-4 py-2 resize-y text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"
                    placeholder="Écrivez votre message ici..."></textarea>
            </div>

            <button type="submit"
                class="inline-flex items-center justify-center px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md shadow-md transition focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Envoyer
            </button>
        </form>

        {{-- Coordonnées --}}
        <div class="bg-[#E0E7FF] dark:bg-[#2A3A4D] rounded-md p-6 text-[#1E2A38] dark:text-[#F4F4F5] shadow-inner">
            <h2 class="text-2xl font-semibold mb-4">Nos coordonnées</h2>
            <p class="mb-3"><strong>Email :</strong> <a href="mailto:boristech99@gmail.com"
                    class="text-blue-100 hover:underline">boristech99@gmail.com</a></p>
            <p class="mb-3"><strong>Téléphone :</strong> <a href="https://wa.me/237679135177"
                    class="text-blue-100  hover:underline">
                    (+237) 6 79 13 51 77 </a>
                / <a href="https://wa.me/237694223503" class="text-blue-100 hover:underline"> 694 22 35 03
                </a></p>
            <p class="mb-6"><strong>Adresse :</strong> Bafoussam-Cameroun; immeuble ancien bureau des transports </p>
            <h3 class="text-xl font-semibold mb-2">Horaires d'ouverture</h3>
            <ul class="list-disc list-inside space-y-1">
                <li>Lundi - Vendredi : 8h00 - 18h00</li>
                <li>Samedi : 9h00 - 16h00</li>
                <li>Dimanche : Fermé</li>
            </ul>
        </div>
    </div>
</div>
@endsection