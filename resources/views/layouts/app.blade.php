<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'DevJobs') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- ENCABEZADO -->
    <header class="bg-[#9543FE] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

            {{-- 🔁 LOGO COMO LINK A HOME --}}
            <a href="{{ route('home') }}" class="text-2xl font-bold hover:underline flex items-center space-x-2">
                <span>DevJobs</span>
            </a>

            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="hover:underline">Inicio</a>
                <a href="{{ route('dashboard') }}" class="hover:underline">Mis Vacantes</a>
                <a href="{{ route('vacantes.crear') }}" class="hover:underline">Crear Vacante</a>
                <a href="#" class="hover:underline">Comunidad</a>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="hover:underline">Registrarse</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main>
        {{ $slot }}
    </main>

    <!-- PIE DE PÁGINA -->
    <footer class="bg-black text-white text-sm py-6 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            © {{ date('Y') }} DevJobs - Desarrollado para Tecsup
        </div>
    </footer>

    @livewireScripts
    @stack('scripts')
</body>
</html>
