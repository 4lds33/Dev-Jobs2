<div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-8">
    <h2 class="text-2xl font-bold text-[#9543FE] mb-6 text-center">Publicar nueva vacante</h2>

    <form wire:submit.prevent='crearVacante' class="space-y-6">

        {{-- TÍTULO --}}
        <div>
            <x-input-label for="titulo" :value="__('Título de la Vacante')" />
            <x-text-input 
                id="titulo" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="titulo" 
                :value="old('titulo')" 
                placeholder="Ej. Desarrollador Full Stack"
            />
            @error('titulo')
                <livewire:monstrar-alerta :message="$message"/>
            @enderror
        </div>

        {{-- SALARIO --}}
        <div>
            <x-input-label for="salario" :value="__('Salario Mensual')" />
            <select
                id="salario"
                wire:model="salario"
                class="w-full mt-1 border-gray-300 focus:border-[#9543FE] focus:ring-[#9543FE] rounded-md shadow-sm"
            >
                <option value="">-- Seleccione --</option>
                @foreach ($salarios as $salario )
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach
            </select>
            @error('salario')
                <livewire:monstrar-alerta :message="$message"/>
            @enderror
        </div>

        {{-- CATEGORÍA --}}
        <div>
            <x-input-label for="categoria" :value="__('Categoría')" />
            <select
                id="categoria"
                wire:model="categoria"
                class="w-full mt-1 border-gray-300 focus:border-[#9543FE] focus:ring-[#9543FE] rounded-md shadow-sm"
            >
                <option value="">-- Seleccione --</option>
                @foreach ($categorias as $categoria )
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
            </select>
            @error('categoria')
                <livewire:monstrar-alerta :message="$message"/>
            @enderror
        </div>

        {{-- EMPRESA --}}
        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input 
                id="empresa" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="empresa" 
                :value="old('empresa')" 
                placeholder="Ej. Netflix, Uber, Shopify"
            />
            @error('empresa')
                <livewire:monstrar-alerta :message="$message"/>
            @enderror
        </div>

        {{-- ÚLTIMO DÍA --}}
        <div>
            <x-input-label for="ultimo_Dia" :value="__('Último día para postularse')" />
            <x-text-input 
                id="ultimo_dia" 
                class="block mt-1 w-full" 
                type="date" 
                wire:model="ultimo_dia" 
                :value="old('ultimo_dia')" 
            />
            @error('ultimo_dia')
                <livewire:monstrar-alerta :message="$message"/>
            @enderror
        </div>

        {{-- DESCRIPCIÓN --}}
        <div>
            <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
            <textarea
                wire:model="descripcion"
                class="w-full mt-1 h-48 border-gray-300 focus:border-[#9543FE] focus:ring-[#9543FE] rounded-md shadow-sm"
                placeholder="Descripción general del puesto, requisitos, experiencia, beneficios..."
            ></textarea>
            @error('descripcion')
                <livewire:monstrar-alerta :message="$message"/>
            @enderror
        </div>

        {{-- IMAGEN --}}
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input 
                id="imagen" 
                class="block mt-1 w-full" 
                type="file" 
                wire:model="imagen"
                accept="image/*"
            />

            @if($imagen)
                <p class="mt-2 text-sm text-gray-600">Previsualización:</p>
                @if(is_object($imagen))
                    <img src="{{ $imagen->temporaryUrl() }}" class="w-48 mt-3 rounded-lg shadow" alt="Imagen temporal" />
                @else
                    <img src="{{ asset('storage/vacantes/' . $imagen) }}" class="w-48 mt-3 rounded-lg shadow" alt="Imagen actual" />
                @endif
            @endif

            @error('imagen')
                <livewire:monstrar-alerta :message="$message"/>
            @enderror
        </div>

        {{-- BOTÓN SUBMIT --}}
        <div class="text-center">
            <button 
                type="submit" 
                class="bg-[#9543FE] hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition">
                Crear Vacante
            </button>
        </div>
    </form>
</div>
