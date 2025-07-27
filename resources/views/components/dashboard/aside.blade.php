
<aside id="sidebar"
    class="min-w-64 bg-white dark:bg-gray-800 shadow-lg min-h-screen fixed z-40 left-0 top-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 md:fixed md:block block md:min-w-64 "
    style="width: 16rem;">
    <div class="h-16 flex items-center justify-center uppercase bg-blue-600 text-white font-bold text-xl ">
        CampusPay
    </div>
    <nav class="mt-6 px-4 space-y-2">

        <a 
        {{-- href="{{ route('home.welcome') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-tachometer-alt mr-2"></i> Accueil
        </a>


        <a 
        {{-- href="{{ route('dashboard.project') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-tachometer-alt mr-2"></i> Tableau de bord
        </a>
        {{-- @auth --}}
        {{-- @if (auth()->user()->role==='admin') --}}
        {{-- @endif --}}
        {{-- @endauth --}}
        {{-- @auth --}}
        {{-- @if (auth()->user()->role==='admin') --}}
        <a
         {{-- href="{{ route('students.index') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-user-graduate mr-2"></i> Étudiants
        </a>
        {{-- @endif --}}
        {{-- @auth --}}
        {{-- @if(auth()->user()->role==='admin') --}}
        <a 
        {{-- href="{{ route('filieres.index') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-book mr-2"></i> Filières
        </a>
        <a 
        {{-- href="{{ route('niveaux.index') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-layer-group mr-2"></i> Niveaux
        </a>
        <a
         {{-- href="{{ route('specialites.index') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-certificate mr-2"></i> Spécialités
        </a>

        {{-- @endauth --}}
        <a
         {{-- href="{{ route('students.index') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-users mr-2"></i> Utilisateurs
        </a>

        <a
         {{-- href="{{ route('frais.index') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-users mr-2"></i> Frais
        </a>
        {{-- @endif --}}
        {{-- @endauth --}}


        {{-- @auth --}}
        {{-- @if(auth()->user()->role==='comptable') --}}
        <a
         {{-- href="{{ route('paiements.index') }}" --}}
            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 hover:text-white text-gray-700 dark:text-gray-200">
            <i class="fas fa-users mr-2"></i> Paiements
        </a>
        {{-- @endif --}}
        {{-- @endauth --}}
        {{-- <a href="{{ route('logout') }}"
            class="block py-2.5 px-4 rounded transition duration-200 bg-red-500 hover:bg-red-600 hover:text-white text-white dark:text-gray-200 ">
            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
        </a> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="block w-full text-left py-2.5 px-4 rounded transition duration-200 bg-red-500 hover:bg-red-600 hover:text-white text-white dark:text-gray-200">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
            </button>
        </form>

    </nav>
</aside>

<!-- Overlay pour mobile -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden" onclick="toggleSidebar()">
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const isOpen = sidebar.classList.contains('translate-x-0');
        if (isOpen) {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        } else {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
        }
    }
</script>

