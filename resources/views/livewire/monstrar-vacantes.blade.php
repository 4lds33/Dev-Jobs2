<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-5">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">
                        Último día: {{ \Carbon\Carbon::parse($vacante->ultimo_dia)->format('d/m/Y') }}
                    </p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a 
                        href="#"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Candidatos</a>

                    <a 
                        href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar</a>

                    <button 
                        wire:click="$emit('monstrarAlerta', {{$vacante->id}})"
                        class="bg-red-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar</button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay Vacantes que mostrar</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('monstrarAlerta', vacanteId = {
        Swal.fire({
            title: "¿Eliminar Vacante?",
            text: "Una vacante eliminada no se puede recuperar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ¡Eliminar!"
            cancelButtonText: "Cancelar" 
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar  la vacante

                Livewire.emit('eliminarVacante', vacanteId)

                Swal.fire({
                    title: "Se Elimino la vacante",
                    text: "Eliminado Correctamente",
                    icon: "success"
                });
            }
        });
        })
    </script>

@endpush