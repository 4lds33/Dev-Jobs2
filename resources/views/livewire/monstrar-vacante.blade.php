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

    <div>
        <div>
            <img src="{{asset('storage/vacantes/'. $vacante->imagen) }}" alt="{{'Imagen vacante'. $vacante->titulo}}">
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>
</div>
