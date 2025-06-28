<div class="mt-10">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        @forelse($vacantes as $vacante)
            <div 
                x-data="{ visible: true }" 
                x-show="visible" 
                x-transition 
                class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 border-b border-gray-200 p-6 hover:bg-gray-50 transition"
                id="vacante-{{ $vacante->id }}"
            >
                {{-- Información de la vacante --}}
                <div class="space-y-2">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-2xl font-semibold text-[#9543FE] hover:underline">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-700 font-medium">
                        Empresa: <span class="font-semibold">{{ $vacante->empresa }}</span>
                    </p>
                    <p class="text-sm text-gray-500">
                        Último día para postular: 
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($vacante->ultimo_dia)->format('d/m/Y') }}</span>
                    </p>
                </div>

                {{-- Botones de acción --}}
                <div class="flex flex-col md:flex-row gap-3">
                    <a 
                        href="#"
                        class="bg-black text-white px-4 py-2 rounded-lg text-sm font-bold uppercase text-center hover:bg-gray-800 transition">
                        Ver
                    </a>

                    <a 
                        href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-[#9543FE] text-white px-4 py-2 rounded-lg text-sm font-bold uppercase text-center hover:bg-purple-700 transition">
                        Editar
                    </a>

                    {{-- BOTÓN DE ELIMINAR FUNCIONAL --}}
                    <button 
                        wire:click="$emit('eliminarVacante', {{ $vacante->id }})"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-bold uppercase text-center transition">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-6 text-center text-sm text-gray-500">No hay vacantes que mostrar.</p>
        @endforelse
    </div>

    {{-- Paginación --}}
    <div class="mt-6">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('monstrarAlerta', (vacanteId) => {
            Swal.fire({
                title: "¿Eliminar Vacante?",
                text: "Una vacante eliminada no se puede recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#9543FE",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarVacante', vacanteId);

                    Swal.fire({
                        title: "Vacante eliminada",
                        text: "Se eliminó correctamente",
                        icon: "success",
                        confirmButtonColor: "#9543FE"
                    });
                }
            });
        });
    </script>
@endpush


