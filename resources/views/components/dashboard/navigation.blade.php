<nav class="hidden md:block">
    <ul class="flex space-x-6 font-medium">
        @auth
         <li>
            <a href="{{ route('dashboard') }}"
                class="text-[#1E2A38] dark:text-[#F4F4F5] hover:text-[#3B82F6] dark:hover:text-[#10B981]
                 transition-colors duration-300 dark:bg-[#2A3A4D] rounded-md px-3 py-2">
                Dashboard
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="text-[#1E2A38] dark:text-[#F4F4F5] hover:text-red-500 dark:hover:text-red-400">
                    Déconnexion
                </button>
            </form>
        </li>
       
        @else
        <li>
            <a href="{{ route('login') }}"
                class="text-[#1E2A38] dark:text-[#F4F4F5] hover:text-[#3B82F6] dark:hover:text-[#10B981]">
                Connexion
            </a>
        </li>
        <li>
            <a href="{{ route('register') }}"
                class="text-[#1E2A38] dark:text-[#F4F4F5] hover:text-[#3B82F6] dark:hover:text-[#10B981]">
                Inscription
            </a>
        </li>
        @endauth
    </ul>
</nav>