<header class="navbar h-header bg-gray-900 px-8 py-4 shadow-md">
    <!-- Izquierda -->
    <div class="flex-1">
        <a href="/" class="text-2xl font-semibold text-primary">
            Programer
        </a>
    </div>

    <!-- Derecha -->
    <div class="flex-none flex items-center space-x-4">

        <a href="/products" class="text-base text-neutral-content hover:text-primary">
            Productos
        </a>
        <a href="/about" class="text-base text-neutral-content hover:text-primary">
            About
        </a>

        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('admin.users.index') }}" class="text-base text-blue-400 hover:text-white font-bold">
                Admins
            </a>
            <a href="{{ route('products.create') }}"
               class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-lg text-sm font-semibold
                      bg-blue-600 hover:bg-blue-500 text-white transition-colors duration-150 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nuevo Curso
            </a>
        @endif

        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-error btn-outline">
                    Logout
                </button>
            </form>
        @else
            <a href="/login"><button class="btn btn-sm btn-neutral">
                Login
            </button></a>
        @endauth

    </div>
</header>
