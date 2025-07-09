<x-guest-layout>
    <div class="flex flex-col md:flex-row h-screen">
        
        {{-- Imagen a la derecha (solo en desktop) --}}
        <div class="hidden md:flex md:w-1/2">
            <img src="{{ asset('images/') }}" alt="Login DevJobs" class="w-full h-full object-cover" />
        </div>

        {{-- Formulario a la izquierda --}}
        <div class="flex items-center justify-center w-full md:w-1/2 p-8 md:p-16 bg-white">
            <div class="w-full max-w-md">
                <h1 class="text-4xl font-extrabold text-[#9543FE] mb-8">Iniciar Sesión</h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" novalidate class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus class="w-full" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password" required class="w-full" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#9543FE] focus:ring-[#9543FE]" />
                            <span class="ml-2 text-gray-600">Recordarme</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-[#9543FE] hover:underline">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <x-primary-button class="w-full justify-center">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>

                    <p class="text-center text-sm mt-6 text-gray-700">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}" class="text-[#9543FE] font-medium hover:underline">Crea una cuenta</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
