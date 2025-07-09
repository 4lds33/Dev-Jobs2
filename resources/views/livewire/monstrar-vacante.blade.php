<div class="p-10 space-y-10">
    {{-- Título --}}
    <div>
        <h1 class="text-4xl font-extrabold text-[#9543FE] mb-2">
            {{ $vacante->titulo }}
        </h1>
        <p class="text-gray-600 text-lg font-semibold">
            Publicado por <span class="text-black">{{ $vacante->empresa }}</span>
        </p>
    </div>

    {{-- Detalles generales --}}
    <div class="grid md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-lg shadow-sm">
        <div>
            <p class="text-sm font-bold text-gray-800 uppercase mb-1">Categoría</p>
            <p class="text-gray-700">{{ $vacante->categoria->categoria }}</p>
        </div>

        <div>
            <p class="text-sm font-bold text-gray-800 uppercase mb-1">Salario Mensual</p>
            <p class="text-gray-700">{{ $vacante->salario->salario }}</p>
        </div>

        <div>
            <p class="text-sm font-bold text-gray-800 uppercase mb-1">Último día para postular</p>
            <p class="text-gray-700">{{ \Carbon\Carbon::parse($vacante->ultimo_dia)->format('d/m/Y') }}</p>
        </div>
    </div>

    {{-- Imagen y descripción --}}
    <div class="grid md:grid-cols-6 gap-6 items-start">
        <div class="md:col-span-2">
            <img 
                src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" 
                alt="Imagen de {{ $vacante->titulo }}" 
                class="rounded-lg shadow-md"
            >
        </div>

        <div class="md:col-span-4 space-y-4">
            <h2 class="text-2xl font-bold text-gray-800">Descripción del Puesto</h2>
            <p class="text-gray-700 text-justify leading-relaxed">{{ $vacante->descripcion }}</p>
        </div>
    </div>

    {{-- Invitación a postularse --}}
    @guest
        <div class="mt-6 bg-gray-200 border border-dashed p-5 text-center rounded-md">
            <p class="text-gray-700 font-semibold">
                ¿Deseas aplicar a esta vacante? 
                <a class="text-[#9543FE] font-bold hover:underline" href="{{ route('register') }}">
                    Crea una cuenta y postula ahora
                </a>
            </p>
        </div>
    @endguest

    {{-- Formulario de postulación --}}
    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot
</div>
