<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'DevJobs') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
    @stack('scripts')
<body class="bg-gray-50 text-gray-900">

    <!-- ENCABEZADO -->
    <header class="bg-[#9543FE] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">DevJobs</h1>
            <nav class="space-x-4">
                <a href="{{ route('dashboard') }}" class="hover:underline">Inicio</a>
                <a href="{{ route('vacantes.crear') }}" class="hover:underline">Publicar Vacante</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Cerrar sesión</button>
                </form>
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
            © {{ date('Y') }} Devjobs - Desarrollado para Tecsup
        </div>
    </footer>

      @livewireScripts
    @stack('scripts') <!-- 👈 Esto es lo que debes agregar -->
</body>
</html>
