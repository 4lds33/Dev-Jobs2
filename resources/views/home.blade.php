<x-app-layout>
    <div class="flex flex-col md:flex-row items-center justify-between bg-gradient-to-r from-purple-700 to-[#9543FE] min-h-[80vh] px-8 py-16">
        {{-- Lado izquierdo: Texto y buscador --}}
        <div class="md:w-1/2 text-white space-y-6">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                Encuentra el trabajo de tus sueños en una empresa
            </h1>
            <p class="text-lg md:text-xl">
                Tenemos vacantes para Front End, Analista de Datos y mucho más.
            </p>

            {{-- Buscador --}}
            <form action="#" method="GET" class="mt-6">
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <input type="text" name="search"
                        placeholder="Ejemplo: Front End, Data Analyst..."
                        class="w-full sm:w-72 px-4 py-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300 text-gray-900">

                    <select name="category" class="w-full sm:w-60 px-4 py-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300 text-gray-900">
                        <option value="">Seleccione área</option>
                        <option value="frontend">Front End</option>
                        <option value="backend">Back End</option>
                        <option value="analyst">Analista de Datos</option>
                        <option value="fullstack">Full Stack</option>
                        <option value="mobile">Desarrollo Mobile</option>
                    </select>

                    <button type="button"
                            onclick="window.location='{{ route('dashboard') }}'"
                            class="bg-yellow-300 text-purple-900 font-semibold px-6 py-3 rounded hover:bg-yellow-400 transition w-full sm:w-auto">
                        Buscar
                    </button>

                </div>
            </form>
        </div>

    {{-- Lado derecho: Imagen --}}
        <div class="md:w-1/2 mt-1 md:mt-0 flex">
            <img src="{{ asset('images/principal.png') }}" alt="DevJobs"
                class="w-full h-full object-cover" />
        </div>
</x-app-layout>
