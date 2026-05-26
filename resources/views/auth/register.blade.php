<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-blue-500 mb-2" style="text-shadow: 0 0 10px #0056ff;">
                Crear Usuario
            </h1>
            <p class="text-gray-400">Regístrate para comenzar a aprender</p>
        </div>

        <div class="card bg-gray-800 shadow-2xl p-8 border border-gray-700">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Nombre</span></label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Tu nombre" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('name') border-error @enderror" required autofocus autocomplete="name" />
                        @error('name') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Email</span></label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="tu@email.com" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('email') border-error @enderror" required autocomplete="username" />
                        @error('email') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Contraseña</span></label>
                        <input id="password" type="password" name="password" placeholder="Mínimo 8 caracteres" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('password') border-error @enderror" required autocomplete="new-password" />
                        @error('password') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Confirmar Contraseña</span></label>
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Repite tu contraseña" class="input input-bordered bg-gray-900 focus:border-blue-500" required autocomplete="new-password" />
                    </div>
                </div>

                <div class="flex items-center justify-between mt-10">
                    <a class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('login') }}">
                        ¿Ya estás registrado? Iniciar sesión
                    </a>

                    <button class="btn btn-primary px-12">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
