<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-blue-500 mb-2" style="text-shadow: 0 0 10px #0056ff;">
                Confirmar Contraseña
            </h1>
            <p class="text-gray-400">Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.</p>
        </div>

        <div class="card bg-gray-800 shadow-2xl p-8 border border-gray-700">
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-control w-full">
                    <label class="label"><span class="label-text text-gray-300 font-bold">Contraseña</span></label>
                    <input id="password" type="password" name="password" placeholder="Tu contraseña" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('password') border-error @enderror" required autocomplete="current-password" />
                    @error('password') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-end mt-8">
                    <button class="btn btn-primary px-8">
                        Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
