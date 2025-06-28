<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacante->titulo}}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
                <samp class="normal-case font-normal">{{$vacante->empresa}}</samp>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Último dia para postularse:
                <samp class="normal-case font-normal">{{$vacante->ultimo_dia}}</samp>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoría:
                <samp class="normal-case font-normal">{{$vacante->categoria->categoria}}</samp>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario:
                <samp class="normal-case font-normal">{{$vacante->salario->salario}}</samp>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/'. $vacante->imagen) }}" alt="{{'Imagen vacante'. $vacante->titulo}}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-200 border border-dashed p-5 text-center">
        <p>
            ¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{route('register')}}">Obten una cuenta y aplica a esta y otras vacantes</a>
        </p>
    </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante/>
    @endcannot

</div>
