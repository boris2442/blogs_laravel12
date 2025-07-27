{{-- Footer --}}
{{-- <footer class="mt-16 text-center text-slate-500">
    <p>&copy; {{ date('Y') }} Mon Blog. Tous droits réservés.</p>
    <p>Conçu avec <span class="text-red-500">&hearts;</span> par <a href="https://aubinsimo.evendeco.com"
            class="text-blue-500 hover:underline">Aubin Boris Simo</a>.</p>

</footer> --}}

<footer class="bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-300 py-12 px-6 mt-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-sm">

        <!-- A propos -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">À propos</h3>
            <p class="leading-relaxed">
                BorisTech est un blog dédié aux passionnés de technologie, de développement et d'innovation.
                Rejoignez-nous pour explorer le monde du numérique.
            </p>
        </div>

        <!-- Navigation rapide -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Navigation</h3>
            <ul class="space-y-2">
                <li><a href="/" class="hover:text-blue-500">Accueil</a></li>
                <li><a href="/articles" class="hover:text-blue-500">Articles</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-blue-500">Contact</a></li>
                <li><a href="/about" class="hover:text-blue-500">À propos</a></li>
            </ul>
        </div>

        <!-- Liens utiles -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Liens utiles</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('cgu') }}" class="hover:text-blue-500">Conditions d'utilisation</a></li>
                <li><a href="{{ route('privacy') }}" class="hover:text-blue-500">Politique de confidentialité</a></li>
                <li>
                    <a href="/plan-du-site" class="hover:text-blue-500">Plan du site</a>
                </li>
            </ul>
        </div>

        <!-- Réseaux sociaux -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Suivez-nous</h3>
            <ul class="flex space-x-4">
                <li><a href="https://facebook.com/boristech" target="_blank" class="hover:text-blue-600">Facebook</a>
                </li>
                <li><a href="https://twitter.com/boristech" target="_blank" class="hover:text-blue-400">Twitter</a></li>
                <li><a href="https://linkedin.com/company/boristech" target="_blank"
                        class="hover:text-blue-700">LinkedIn</a></li>
            </ul>
        </div>
    </div>

    <div
        class="mt-10 border-t border-gray-300 dark:border-gray-700 pt-6 text-center text-xs text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} BorisTech. Tous droits réservés.
    </div>
</footer>