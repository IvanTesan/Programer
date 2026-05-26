<x-layouts.layout>
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-4xl font-extrabold text-blue-500" style="text-shadow: 0 0 10px #0056ff;">
                Gestión de Administradores
            </h1>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                Nuevo Administrador
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-4 mb-6 shadow-lg">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error mt-4 mb-6 shadow-lg">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto bg-gray-800 rounded-xl shadow-2xl border border-gray-700">
            <table class="table w-full text-gray-300">
                <thead>
                    <tr class="bg-gray-900 text-gray-400">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Nombre</th>
                        <th class="py-4 px-6">Email</th>
                        <th class="py-4 px-6">Rol</th>
                        <th class="py-4 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-750 transition-colors border-b border-gray-700 last:border-0 text-white">
                            <td class="py-4 px-6 font-mono text-xs opacity-50">{{ $user->id }}</td>
                            <td class="py-4 px-6">
                                <span class="font-bold text-lg">{{ $user->name }}</span>
                            </td>
                            <td class="py-4 px-6">{{ $user->email }}</td>
                            <td class="py-4 px-6">
                                <div class="badge badge-primary">{{ $user->role }}</div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este administrador?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-error">Eliminar</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.layout>
