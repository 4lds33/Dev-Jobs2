<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl fant-bold my-4">Postularme a esta vacante</h3>

    <form action="w-96 mt-5">
        <div class="mb-4">
            <x-label for="cv" :value="__('Curriculum o Hoja de Vida')"/>
            <x-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full"/>
        </div>

        <x-primary-button class="my-5">
            {{('Postularme')}}
        </x-primary-button>
    </form>
</div>