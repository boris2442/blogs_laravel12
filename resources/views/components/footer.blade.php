<footer class="bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-300 py-12 px-6 mt-20">
    <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-sm">

        <!-- À propos -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">À propos</h3>
            <p class="leading-relaxed">
                Boris Tech – Vente de téléphones, ordinateurs & accessoires à Bafoussam et Yaoundé.
                Blog tech, conseils pratiques & livraison rapide au Cameroun. 📱💻✨
            </p>
        </div>

        <!-- Navigation rapide -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Pages</h3>
            <ul class="space-y-2">
                <li><a href="/" class="hover:text-blue-600 dark:hover:text-blue-400">Accueil</a></li>
                <li><a href="{{ route('posts.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Articles</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Contact</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-blue-600 dark:hover:text-blue-400">À propos</a></li>
            </ul>
        </div>

        <!-- Liens utiles -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Liens utiles</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('cgu') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Conditions d'utilisation</a></li>
                <li><a href="{{ route('privacy.policy') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Politique de confidentialité</a></li>
                {{-- <li>
                    <a href="/plan-du-site" class="hover:text-blue-600 dark:hover:text-blue-400">Plan du site</a>
                </li> --}}
            </ul>
        </div>

        <!-- Réseaux sociaux -->
        <div>
            <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Suivez-nous</h3>
            <ul class="flex space-x-4">
                <li>
                    <a href="https://www.facebook.com/Boris%20Tech" target="_blank" rel="noopener noreferrer"
                        class="hover:text-blue-700 dark:hover:text-blue-500">
                        <i class="fab fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/boristech" target="_blank" class="hover:text-blue-400 dark:hover:text-blue-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://linkedin.com/company/boristech" target="_blank" class="hover:text-blue-800 dark:hover:text-blue-600">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="mt-10 border-t border-gray-300 dark:border-gray-700 pt-6 text-xs text-gray-500 dark:text-gray-400 flex justify-between items-center">
        <p>
            Conçu avec <span class="text-red-500">&hearts;</span> par <a href="https://aubinsimo.evendeco.com"
                class="text-blue-600 hover:underline dark:text-blue-400">Aubin Boris Simo</a>
            .
        </p>
        <p>&copy; {{ date('Y') }} BorisTech. Tous droits réservés.</p>
    </div>
</footer>
