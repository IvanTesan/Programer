<x-layouts.layout>
        {{-- Sección de Banner/Hero: "Aprende a programar" --}}
        <section class="mb-16 md:mb-20">
            {{-- El componente 'hero' de DaisyUI se adapta bien a este diseño --}}
            <div class="hero rounded-box shadow-xl bg-gray-800 border-">
                <div class="hero-content text-center py-12 px-6 md:py-16 md:px-10">
                    <div class="max-w-3xl">
                        {{-- Título Principal --}}
                        <h1 class="text-5xl md:text-6xl mb-4 text-blue-500"
                            style="text-shadow: 0 0 10px #0056ff;">
                            Aprende a programar
                        </h1>

                        {{-- Texto Descriptivo --}}
                        <p class="mb-8 text-lg text-gray-300 leading-relaxed">
                            Texto descriptivo Lorem ipsum dolor sit amet consectetur adipiscing elit, quam interdum sagittis neque facilisi luctus sodales suscipit, curabitur gravida suspendisse dictumst molestie nullam. Lacus eros tincidunt vulputate fermentum molestie egestas purus, a mi vestibulum cras tempor bibendum
                        </p>

                        <a href="{{ route('products.index') }}"><button class="btn btn-primary btn-lg shadow-lg">
                            Ver todos los cursos
                        </button></a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Sección de Cursos Dinámica --}}
        <section>
            <div class="flex justify-between items-end mb-10">
                <h2 class="text-4xl font-bold text-white">
                    Cursos Recomendados
                </h2>
                <a href="{{ route('products.index') }}" class="link link-primary">Ver todos</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($courses as $course)
                    <div class="card bg-gray-800 shadow-xl border border-gray-700 overflow-hidden hover:scale-105 transition-transform duration-300">
                        <figure class="h-40 bg-gradient-to-br {{ $course->gradient }} flex items-center justify-center opacity-80">
                            <span class="text-4xl font-black text-white opacity-20">{{ $course->tag }}</span>
                        </figure>
                        <div class="card-body p-6 text-white">
                            <div class="flex justify-between items-start gap-2 mb-2">
                                <h3 class="card-title text-xl font-bold leading-tight">{{ $course->title }}</h3>
                                <div class="badge badge-sm {{ $course->level == 'Básico' ? 'badge-accent' : ($course->level == 'Intermedio' ? 'badge-info text-white' : 'badge-error text-white') }}">
                                    {{ $course->level }}
                                </div>
                            </div>
                            <p class="text-gray-400 text-sm line-clamp-2 mb-4">
                                {{ $course->description }}
                            </p>
                            <div class="card-actions justify-end mt-auto">
                                <a href="{{ route('products.show', $course->id) }}" class="btn btn-primary btn-xs btn-outline">Explorar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

</x-layouts.layout>
