<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-blue-500 mb-2" style="text-shadow: 0 0 10px #0056ff;">
                Iniciar Sesión
            </h1>
            <p class="text-gray-400">Accede a tu cuenta de Programer</p>
        </div>

        <div class="card bg-gray-800 shadow-2xl p-8 border border-gray-700">
            <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Email</span></label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Ej: admin@admin.com" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('email') border-error @enderror" required autofocus autocomplete="username" />
                        @error('email') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Contraseña</span></label>
                        <input id="password" type="password" name="password" placeholder="Tu contraseña" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('password') border-error @enderror" required autocomplete="current-password" />
                        @error('password') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="block col-span-2 mt-2">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="checkbox checkbox-primary border-gray-600" name="remember" />
                            <span class="ms-2 text-sm text-gray-400">Recordarme</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-10">
                    @if (Route::has('register'))
                        <a class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('register') }}">
                            ¿No tienes cuenta? Regístrate
                        </a>
                    @endif

                    <div class="flex items-center gap-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif

                        <button class="btn btn-primary px-8">
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
