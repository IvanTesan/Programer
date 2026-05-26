<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-10 flex items-center justify-between">
            <h1 class="text-4xl font-extrabold text-blue-500" style="text-shadow: 0 0 10px #0056ff;">
                {{ isset($user) ? 'Editar Administrador' : 'Nuevo Administrador' }}
            </h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-ghost btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-7-7a1 1 0 010-1.414l7-7a1 1 0 011.414 1.414L4.414 9H17a1 1 0 110 2H4.414l5.293 5.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Volver
            </a>
        </div>

        <div class="card bg-gray-800 shadow-2xl p-8 border border-gray-700">
            <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Nombre</span></label>
                        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Ej: admin" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('name') border-error @enderror" required />
                        @error('name') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Email</span></label>
                        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Ej: admin@admin.com" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('email') border-error @enderror" required />
                        @error('email') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Contraseña {{ isset($user) ? '(dejar en blanco para no cambiar)' : '' }}</span></label>
                        <input type="password" name="password" placeholder="Mínimo 4 caracteres" class="input input-bordered bg-gray-900 focus:border-blue-500 @error('password') border-error @enderror" {{ isset($user) ? '' : 'required' }} />
                        @error('password') <span class="text-error mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label"><span class="label-text text-gray-300 font-bold">Confirmar Contraseña</span></label>
                        <input type="password" name="password_confirmation" placeholder="Repite la contraseña" class="input input-bordered bg-gray-900 focus:border-blue-500" />
                    </div>
                </div>

                <div class="flex justify-end mt-10 gap-4">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-neutral px-8">Cancelar</a>
                    <button type="submit" class="btn btn-primary px-12">{{ isset($user) ? 'Actualizar' : 'Crear Administrador' }}</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
