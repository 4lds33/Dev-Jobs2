<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-[#9543FE]">
            {{ __('Mis Vacantes Publicadas') }}
        </h2>

        @if (session()->has('mensaje'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm">
                <p class="font-semibold">{{ session('mensaje') }}</p>
            </div>
        @endif

    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Vacantes activas</h3>
                    <a href="{{ route('vacantes.crear') }}"
                       class="bg-[#9543FE] hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        + Nueva vacante
                    </a>
                </div>

                <livewire:monstrar-vacantes />
            </div>
        </div>
    </div>
</x-app-layout>
