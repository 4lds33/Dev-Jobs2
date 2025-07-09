<x-guest-layout>
    <div class="flex flex-col md:flex-row min-h-screen">
        {{-- Lado izquierdo: Formulario --}}
        <div class="md:w-1/2 w-full flex items-center justify-center bg-white p-6 md:p-16 overflow-y-auto">
            <div class="w-full max-w-lg">
                <h1 class="text-3xl md:text-4xl font-extrabold text-[#9543FE] mb-8">Crear Cuenta</h1>

                <form method="POST" action="{{ route('register') }}" novalidate class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="w-full" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="w-full" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Rol -->
                    <div>
                        <x-input-label for="rol" :value="__('¿Qué tipo de cuenta deseas en DevJobs?')" />
                        <select id="rol" name="rol" required
                            class="border-gray-300 focus:border-[#9543FE] focus:ring-[#9543FE] rounded-md shadow-sm w-full">
                            <option value="">-- Selecciona un rol --</option>
                            <option value="1" {{ old('rol') == '1' ? 'selected' : '' }}>Developer - Obtener Empleo</option>
                            <option value="2" {{ old('rol') == '2' ? 'selected' : '' }}>Reclutador - Publicar Empleos</option>
                        </select>
                        <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password" required autocomplete="new-password" class="w-full" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Repetir Password')" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div>
                        <x-primary-button class="w-full justify-center">
                            {{ __('Crear Cuenta') }}
                        </x-primary-button>
                    </div>

                    <p class="text-sm mt-6 text-gray-700">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="text-[#9543FE] hover:underline font-medium">Inicia sesión</a>
                    </p>
                </form>
            </div>
        </div>

        {{-- Lado derecho: Imagen --}}
        <div class="md:w-1/2 hidden md:block">
            <img src="{{ asset('images/register.jpg') }}" alt="Register DevJobs" class="w-full h-screen object-cover" />
        </div>
    </div>
</x-guest-layout>
