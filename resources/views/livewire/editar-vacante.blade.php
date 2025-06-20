<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />

        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            placeholder="Titulo Vacante"
        />

        @error('titulo')
            <livewire:monstrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select
            id="salario"
            wire:model="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option>--Selecione --</option>
            @foreach ($salarios as $salario )
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>

        @error('salario')
            <livewire:monstrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />

        <select
            id="categoria"
            wire:model="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
        <option>--Selecione --</option>
            @foreach ($categorias as $categoria )
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>

        @error('categoria')
            <livewire:monstrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            placeholder="Empresa: ej. Netflix, Uber, Shopify"
        />

        @error('empresa')
            <livewire:monstrar-alerta :message="$message"/>
        @enderror
    </div>

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

    <div>
        <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
        <textarea
            wire:model="descripcion"
            placeholder="Descripción general del puesto, experiencia"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
        ></textarea>
        @error('discripcion')
            <livewire:monstrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen_nueva"
            accept="image/*"
        />

        <div class="my-5 w-96">
            <x-input-label :value="__('Vista Previa de la Imagen')" />
    
            @if ($imagen)
        @if (is_object($imagen))
            {{-- Vista previa si es un archivo temporal nuevo --}}
            <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen temporal" />
        @else
            {{-- Vista previa si ya está guardada --}}
            <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="Imagen existente" />
            @endif
        @endif
        </div>

        <div class="my-5 w-96">
            @if($imagen_nueva)
                Imagen Nueva:
                <img src="{{ $imagen_nueva->temporaryUrl() }}">
            @endif
        </div> 

        @error('imagen_nueva')
            <livewire:monstrar-alerta :message="$message"/>
        @enderror
    </div>

    <x-primary-button>
        Guardar Cambios
    </x-primary-button>
</form>