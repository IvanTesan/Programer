<x-layouts.layout>
    {{-- Products Header --}}
    <section class="mb-12">
        <div class="text-center">
            <h1 class="text-5xl font-extrabold text-blue-500 mb-4" style="text-shadow: 0 0 10px #0056ff;">
                Nuestros Cursos
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8">
                Explora nuestro catálogo de cursos diseñados para llevarte desde cero hasta el nivel profesional en las tecnologías más demandadas.
            </p>
            
            {{-- Admin: Create Button --}}
            @if(Auth::check() && Auth::user()->role === 'admin')
            <div class="flex justify-center mb-8">
                <a href="{{ route('products.create') }}" class="btn btn-primary gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Añadir Nuevo Curso
                </a>
            </div>
            @endif
        </div>
    </section>

    @if(session('success'))
        <div class="alert alert-success shadow-lg mb-8 max-w-4xl mx-auto">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Course Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        
        @foreach($courses as $course)
            <div class="card bg-gray-800 shadow-2xl overflow-hidden hover:scale-[1.02] transition-transform duration-300">
                <figure class="h-48 bg-gradient-to-br {{ $course->gradient }} flex items-center justify-center relative">
                    <span class="text-6xl font-bold text-white opacity-20">{{ $course->tag }}</span>
                    
                    {{-- Admin actions overlay or float --}}
                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="absolute top-2 right-2 flex gap-2">
                        <a href="{{ route('products.edit', $course->id) }}" class="btn btn-circle btn-xs btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>
                        <form action="{{ route('products.destroy', $course->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este curso?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-circle btn-xs btn-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    @endif
                </figure>
                <div class="card-body p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h2 class="card-title text-2xl font-bold text-white leading-tight">{{ $course->title }}</h2>
                        <div class="badge {{ $course->level == 'Básico' ? 'badge-accent' : ($course->level == 'Intermedio' ? 'badge-info text-white' : 'badge-error text-white font-bold') }}">
                            {{ $course->level }}
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mb-4 leading-relaxed line-clamp-3">
                        {{ $course->description }}
                    </p>
                    <div class="mt-auto flex justify-end">
                        <a href="{{ route('products.show', $course->id) }}" class="btn btn-primary btn-sm btn-outline px-8">Entrar</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-layouts.layout>
