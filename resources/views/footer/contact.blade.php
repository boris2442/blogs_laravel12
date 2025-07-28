@extends('layouts.website.app')
@section('title', 'Contactez BorisTech')

@section('content')
<section
    class="mx-auto max-w-5xl px-6 py-16 antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300 rounded-xl shadow-xl">

    <h1 class="text-4xl font-extrabold text-center mb-12 tracking-tight">📬 Contactez <span
            class="text-indigo-600">BorisTech</span></h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        {{-- 📥 Formulaire de contact --}}
        <form action="{{ route('contact.store') }}" method="POST"
            class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            <div>
                <label for="name" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">👤 Nom complet</label>
                <input type="text" name="name" id="name" required
                    class="w-full rounded-md border border-gray-300 px-4 py-3 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="Votre nom complet">
            </div>

            <div>
                <label for="email" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">📧 Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full rounded-md border border-gray-300 px-4 py-3 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="votre.email@example.com">
            </div>

            <div>
                <label for="subject" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">📝 Sujet</label>
                <input type="text" name="subject" id="subject" required
                    class="w-full rounded-md border border-gray-300 px-4 py-3 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="Demande de devis, support, livraison...">
            </div>

            <div>
                <label for="message" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">💬 Message</label>
                <textarea name="message" id="message" rows="5" required
                    class="w-full rounded-md border border-gray-300 px-4 py-3 resize-y text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="Écrivez votre message ici..."></textarea>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-md transition shadow-md">
                ✉️ Envoyer mon message
            </button>
        </form>

        {{-- 📞 Coordonnées --}}
        <div class="space-y-6 bg-indigo-50 dark:bg-gray-800 p-6 rounded-lg shadow-inner">
            <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">📡 Nos coordonnées</h2>

            <p class="flex items-center gap-2 text-gray-800 dark:text-gray-300">
                <span class="font-medium">📧 Email :</span>
                <a href="mailto:boristech99@gmail.com" class="text-indigo-600 hover:underline">boristech99@gmail.com</a>
            </p>

            <p class="flex flex-col gap-2 text-gray-800 dark:text-gray-300">
                <span class="font-medium">📱 WhatsApp :</span>
                <a href="https://wa.me/237679135177" class="text-green-600 hover:underline">+237 679 13 51 77</a>
                <a href="https://wa.me/237694223503" class="text-green-600 hover:underline">+237 694 22 35 03</a>
            </p>

            <p class="text-gray-800 dark:text-gray-300">
                <span class="font-medium">📍 Adresse :</span> Bafoussam, Cameroun – Immeuble ancien bureau des
                transports
            </p>

            <div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">⏰ Horaires d'ouverture</h3>
                <ul class="list-disc list-inside space-y-1 text-gray-700 dark:text-gray-400">
                    <li>Lundi - Vendredi : 8h00 – 18h00</li>
                    <li>Samedi : 9h00 – 16h00</li>
                    <li>Dimanche : Fermé</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection