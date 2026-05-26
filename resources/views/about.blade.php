<x-layouts.layout>
    {{-- Banner Section --}}
    <section class="mb-16 md:mb-20">
        <div class="hero rounded-box shadow-xl bg-gray-800 border-none">
            <div class="hero-content text-center py-12 px-6 md:py-16 md:px-10">
                <div class="max-w-3xl">
                    <h1 class="text-5xl md:text-6xl mb-4 text-blue-500 font-bold"
                        style="text-shadow: 0 0 10px #0056ff;">
                        Quiénes Somos
                    </h1>
                    <p class="mb-8 text-lg text-gray-300 leading-relaxed">
                        En Programer, nuestra pasión es democratizar el aprendizaje de la programación. Creemos que el código es el lenguaje del futuro y que todos deberían tener la oportunidad de aprenderlo de manera sencilla, práctica y divertida.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission and Vision Section --}}
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20">
        <div class="card bg-gray-800 shadow-xl p-8 border border-gray-700">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-blue-600 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white">Nuestra Misión</h2>
            </div>
            <p class="text-gray-400 text-lg">
                Proporcionar una plataforma educativa de alta calidad donde cualquier persona, sin importar su experiencia previa, pueda convertirse en un desarrollador competente y listo para el mercado laboral.
            </p>
        </div>

        <div class="card bg-gray-800 shadow-xl p-8 border border-gray-700">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-purple-600 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white">Nuestra Visión</h2>
            </div>
            <p class="text-gray-400 text-lg">
                Ser la comunidad líder de habla hispana para desarrolladores de software, reconocida por la calidad de sus contenidos, la innovación constante y el apoyo mutuo entre sus miembros.
            </p>
        </div>
    </section>

    {{-- Our Values Section --}}
    <section class="mb-20">
        <h2 class="text-4xl font-bold mb-12 text-white text-center">Nuestros Valores</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            {{-- Value 1 --}}
            <div class="card bg-gray-900 border border-gray-800 p-8 hover:border-blue-500 transition-colors duration-300">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9l-.707.707M16.243 4.757l-.707-.707M12 21v-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Innovación</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Buscamos siempre las últimas tendencias y tecnologías para mantener nuestro contenido actualizado y relevante.
                </p>
            </div>

            {{-- Value 2 --}}
            <div class="card bg-gray-900 border border-gray-800 p-8 hover:border-blue-500 transition-colors duration-300">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Comunidad</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Fomentamos un ambiente de colaboración donde todos los estudiantes pueden aprender unos de otros.
                </p>
            </div>

            {{-- Value 3 --}}
            <div class="card bg-gray-900 border border-gray-800 p-8 hover:border-blue-500 transition-colors duration-300">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Accesibilidad</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Diseñamos nuestra plataforma para que el conocimiento sea accesible sin importar la ubicación geográfica.
                </p>
            </div>

            {{-- Value 4 --}}
            <div class="card bg-gray-900 border border-gray-800 p-8 hover:border-blue-500 transition-colors duration-300">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Excelencia</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Nos comprometemos con la máxima calidad en cada lección, ejercicio y recurso que compartimos.
                </p>
            </div>

        </div>
    </section>

    {{-- Contact Banner --}}
    <section>
        <div class="card bg-gradient-to-r from-blue-700 to-indigo-800 text-white p-10 text-center shadow-2xl">
            <h2 class="text-3xl font-bold mb-4">¿Quieres saber más?</h2>
            <p class="text-lg mb-8 opacity-90">
                Estamos siempre abiertos a nuevas colaboraciones y feedback de nuestra comunidad.
            </p>
            <div class="flex justify-center gap-4">
                <button class="btn btn-white btn-outline border-white text-white hover:bg-white hover:text-indigo-800">Contáctanos</button>
            </div>
        </div>
    </section>
</x-layouts.layout>
