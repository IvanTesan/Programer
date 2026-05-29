<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-blue-500 mb-2" style="text-shadow: 0 0 10px #0056ff;">
                ¿Olvidaste tu contraseña?
            </h1>
            <p class="text-gray-400">No hay problema. Indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.</p>
        </div>

        <div class="card bg-gray-800 shadow-2xl p-8 border border-gray-700">
            <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-control w-full max-w-md mx-auto">
                    <label class="label"><span class="label-text text-gray-300 font-bold">Email</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Ej: admin@admin.com" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('email') border-error @enderror" required autofocus />
                    @error('email') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('login') }}">
                        Volver a Iniciar Sesión
                    </a>

                    <button class="btn btn-primary px-8">
                        Enviar Enlace
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
