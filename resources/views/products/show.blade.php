<x-layouts.layout>
<style>
    .quill-content h1 { font-size: 1.6rem; font-weight: 700; color: #f9fafb; margin: 1rem 0 0.5rem; }
    .quill-content h2 { font-size: 1.3rem; font-weight: 700; color: #f1f5f9; margin: 1rem 0 0.5rem; }
    .quill-content h3 { font-size: 1.1rem; font-weight: 600; color: #e2e8f0; margin: 0.75rem 0 0.4rem; }
    .quill-content p  { margin: 0.5rem 0; }
    .quill-content strong { font-weight: 700; color: #f9fafb; }
    .quill-content em { font-style: italic; }
    .quill-content a  { color: #60a5fa; text-decoration: underline; }
    .quill-content ul { list-style: disc; padding-left: 1.5rem; margin: 0.5rem 0; }
    .quill-content ol { list-style: decimal; padding-left: 1.5rem; margin: 0.5rem 0; }
    .quill-content li { margin: 0.25rem 0; }
    .quill-content blockquote { border-left: 4px solid #3b82f6; padding-left: 1rem; color: #94a3b8; margin: 0.75rem 0; font-style: italic; }
    .quill-content pre  { background: #0f172a; color: #f472b6; padding: 1rem; border-radius: 0.5rem; overflow-x: auto; font-family: monospace; font-size: 0.875rem; margin: 0.75rem 0; }
    .quill-content code { background: #1e293b; color: #f472b6; padding: 0.1rem 0.3rem; border-radius: 3px; font-family: monospace; font-size: 0.875rem; }
    .quill-content .ql-indent-1 { padding-left: 2rem; }
    .quill-content .ql-indent-2 { padding-left: 4rem; }
</style>
<div class="max-w-5xl mx-auto px-4 py-8">

    {{-- ═══════════════════ HERO ═══════════════════ --}}
    <div class="card bg-gray-800 shadow-2xl overflow-hidden mb-10 text-shadow-none">
        <figure class="h-64 bg-gradient-to-br {{ $course->gradient }} flex items-center justify-center relative">
            <span class="text-9xl font-bold text-white opacity-20 select-none">{{ $course->tag }}</span>

            {{-- Back button --}}
            <div class="absolute top-4 left-6">
                <a href="{{ route('products.index') }}"
                   class="btn btn-circle btn-sm bg-black/30 border-none text-white hover:bg-black/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>

            {{-- Level badge --}}
            <div class="absolute top-4 right-6">
                <div class="badge badge-lg
                    {{ $course->level == 'Básico' ? 'badge-accent' : ($course->level == 'Intermedio' ? 'badge-info text-white' : 'badge-error text-white') }}
                    font-bold px-4">
                    Nivel {{ $course->level }}
                </div>
            </div>
        </figure>

        <div class="card-body p-8 md:p-10">
            <div class="flex flex-wrap justify-between items-start gap-4 mb-4">
                <h1 class="text-4xl font-bold text-white">{{ $course->title }}</h1>
            </div>
            <p class="text-xl text-gray-300 leading-relaxed">{{ $course->description }}</p>

            {{-- Stats row --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                <div class="bg-gray-900 rounded-xl p-4 border border-gray-700 text-center">
                    <span class="text-blue-400 font-bold block text-sm uppercase mb-1">Secciones de Teoría</span>
                    <span class="text-white text-2xl font-bold">{{ $course->sections->count() }}</span>
                </div>
                <div class="bg-gray-900 rounded-xl p-4 border border-gray-700 text-center">
                    <span class="text-green-400 font-bold block text-sm uppercase mb-1">Imágenes en Secciones</span>
                    <span class="text-white text-2xl font-bold">{{ $course->sections->where('media_type', 'image')->count() }}</span>
                </div>
                <div class="bg-gray-900 rounded-xl p-4 border border-gray-700 text-center">
                    <span class="text-purple-400 font-bold block text-sm uppercase mb-1">Vídeos en Secciones</span>
                    <span class="text-white text-2xl font-bold">{{ $course->sections->where('media_type', 'video')->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════ TEORÍA ═══════════════════ --}}
    @if($course->sections->isNotEmpty())
    <section class="mb-12">
        <h2 class="text-2xl font-extrabold text-white mb-6 flex items-center gap-3">
            <span class="w-1 h-7 bg-blue-500 rounded-full inline-block"></span>
            Contenido Teórico
        </h2>

        <div class="space-y-4">
            @foreach($course->sections as $i => $section)
            <div class="collapse collapse-arrow bg-gray-800 border border-gray-700 rounded-xl" id="section-{{ $i }}">
                <input type="checkbox" {{ $i === 0 ? 'checked' : '' }} />
                <div class="collapse-title text-lg font-semibold text-white flex items-center gap-3">
                    <span class="w-7 h-7 rounded-full bg-blue-500/20 text-blue-400 text-sm font-bold flex items-center justify-center flex-shrink-0">
                        {{ $i + 1 }}
                    </span>
                    {{ $section->title }}
                </div>
                <div class="collapse-content">
                    <div class="quill-content pt-2 pb-4 text-gray-300 leading-relaxed border-t border-gray-700 mt-2">
                        {!! $section->content !!}

                        {{-- Section Media Resource --}}
                        @if($section->media_type === 'image' && $section->media_path)
                            <div class="mt-4 pt-4 border-t border-gray-700/50 flex justify-center">
                                <div class="max-w-2xl w-full rounded-lg overflow-hidden border border-gray-700 shadow-lg">
                                    <img src="{{ Storage::url($section->media_path) }}" alt="{{ $section->title }}" class="w-full h-auto object-cover max-h-[500px]">
                                </div>
                            </div>
                        @elseif($section->media_type === 'video' && $section->media_path)
                            <div class="mt-4 pt-4 border-t border-gray-700/50">
                                @php $embedUrl = $section->getEmbedUrl(); @endphp
                                @if($embedUrl)
                                    <div class="relative w-full rounded-lg overflow-hidden border border-gray-700 shadow-lg" style="padding-top: 56.25%">
                                        <iframe src="{{ $embedUrl }}" title="{{ $section->title }}"
                                                class="absolute inset-0 w-full h-full"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                        </iframe>
                                    </div>
                                @else
                                    <div class="flex items-center gap-3 bg-gray-900 rounded-lg p-4 border border-gray-750 text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm12.553 1.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                        </svg>
                                        <a href="{{ $section->media_path }}" target="_blank" class="text-purple-400 hover:underline font-medium break-all">
                                            {{ $section->media_path }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ═══════════════════ ADMIN CONTROLS ═══════════════════ --}}
    @if(Auth::check() && Auth::user()->role === 'admin')
    <div class="flex justify-end gap-3 pt-6 border-t border-gray-800 opacity-60 hover:opacity-100 transition-opacity">
        <a href="{{ route('products.edit', $course->id) }}" class="btn btn-warning btn-outline btn-sm">
            ✏️ Editar Curso
        </a>
        <form action="{{ route('products.destroy', $course->id) }}" method="POST"
              onsubmit="return confirm('¿Eliminar este curso y todos sus archivos?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-error btn-outline btn-sm">🗑️ Eliminar Curso</button>
        </form>
    </div>
    @endif

</div>
</x-layouts.layout>
