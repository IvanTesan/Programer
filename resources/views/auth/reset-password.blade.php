<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-blue-500 mb-2" style="text-shadow: 0 0 10px #0056ff;">
                Restablecer Contraseña
            </h1>
            <p class="text-gray-400">Ingresa tu correo electrónico y tu nueva contraseña.</p>
        </div>

        <div class="card bg-gray-800 shadow-2xl p-8 border border-gray-700">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Email Address -->
                    <div class="form-control w-full col-span-2 max-w-md mx-auto">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Email</span></label>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="tu@email.com" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('email') border-error @enderror" required autofocus autocomplete="username" />
                        @error('email') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Nueva Contraseña</span></label>
                        <input id="password" type="password" name="password" placeholder="Mínimo 8 caracteres" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('password') border-error @enderror" required autocomplete="new-password" />
                        @error('password') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Confirmar Contraseña</span></label>
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Repite tu contraseña" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('password_confirmation') border-error @enderror" required autocomplete="new-password" />
                        @error('password_confirmation') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end mt-10">
                    <button class="btn btn-primary px-8">
                        Restablecer Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
