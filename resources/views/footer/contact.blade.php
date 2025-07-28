@extends('layouts.website.app')
@section('title', 'Contactez BorisTech')

@section('content')
<section
    class="mx-auto max-w-5xl px-6 py-16 bg-[#FAFAFA] dark:bg-[#1E2A38] text-[#111827] dark:text-white transition-colors duration-300 rounded-xl shadow-xl">

    <h1 class="text-4xl font-extrabold text-center mb-12 tracking-tight">📬 Contactez <span
            class="text-indigo-600">BorisTech</span></h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        {{-- 📥 Formulaire de contact --}}
        <form action="{{ route('contact.store') }}" method="POST"
            class="space-y-6 bg-white dark:bg-[#2A3A4D] p-6 rounded-lg shadow-md">
            @csrf
            <div>
                <label for="name" class="block mb-2 font-medium">👤 Nom complet</label>
                <input type="text" name="name" id="name" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 outline-none transition"
                    placeholder="Votre nom complet">
            </div>

            <div>
                <label for="email" class="block mb-2 font-medium">📧 Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 outline-none transition"
                    placeholder="votre.email@example.com">
            </div>

            <div>
                <label for="subject" class="block mb-2 font-medium">📝 Sujet</label>
                <input type="text" name="subject" id="subject" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 outline-none transition"
                    placeholder="Demande de devis, support, livraison...">
            </div>

            <div>
                <label for="message" class="block mb-2 font-medium">💬 Message</label>
                <textarea name="message" id="message" rows="5" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 resize-y text-[#111827] dark:text-[#1E2A38] dark:bg-[#F4F4F5] focus:ring-2 focus:ring-indigo-500 outline-none transition"
                    placeholder="Écrivez votre message ici..."></textarea>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition shadow-lg">
                ✉️ Envoyer mon message
            </button>
        </form>

        {{-- 📞 Coordonnées --}}
        <div class="space-y-6 bg-[#E0E7FF] dark:bg-[#2E3B4E] p-6 rounded-lg shadow-inner">
            <h2 class="text-2xl font-semibold mb-4">📡 Nos coordonnées</h2>

            <p class="flex items-center gap-2">
                <span class="font-medium">📧 Email :</span>
                <a href="mailto:boristech99@gmail.com" class="text-blue-600 hover:underline">boristech99@gmail.com</a>
            </p>

            <p class="flex flex-col gap-2">
                <span class="font-medium">📱 WhatsApp :</span>
                <a href="https://wa.me/237679135177" class="text-green-600 hover:underline">+237 679 13 51 77</a>
                <a href="https://wa.me/237694223503" class="text-green-600 hover:underline">+237 694 22 35 03</a>
            </p>

            <p>
                <span class="font-medium">📍 Adresse :</span> Bafoussam, Cameroun – Immeuble ancien bureau des
                transports
            </p>

            <div>
                <h3 class="text-xl font-semibold mb-2">⏰ Horaires d'ouverture</h3>
                <ul class="list-disc list-inside space-y-1">
                    <li>Lundi - Vendredi : 8h00 – 18h00</li>
                    <li>Samedi : 9h00 – 16h00</li>
                    <li>Dimanche : Fermé</li>
                </ul>
            </div>

            {{-- <div class="pt-4">
                <span class="font-medium">🔗 Suivez-nous :</span>
                <div class="flex space-x-4 mt-2">
                    <a href="https://facebook.com/boristech" target="_blank"
                        class="hover:underline text-blue-500">Facebook</a>
                    <a href="https://wa.me/237679135177" target="_blank"
                        class="hover:underline text-green-600">WhatsApp</a>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection