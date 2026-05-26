<x-layouts.layout>
    <main class="bg-base-300 min-h-screen py-12 md:py-20 lg:py-24 px-4 md:px-8 text-white">

        {{-- Sección de Banner/Hero: "Título de la tienda" --}}
        <section class="mb-20 md:mb-32 flex justify-center text-center">
            <div class="max-w-4xl p-6">
                {{-- Título Principal Azul --}}
                <h1 class="text-5xl md:text-7xl font-extrabold mb-4 text-blue-400"
                    style="text-shadow: 0 0 10px #0056ff;">
                    Título de la tienda
                </h1>

                {{-- Subtítulo --}}
                <p class="mb-8 text-xl text-gray-300 leading-relaxed">
                    Subtítulo con la descripción de tu sitio de compras
                </p>

                {{-- Botón (Componente 'btn' de DaisyUI) --}}
                {{-- Usamos 'btn-outline' con 'btn-primary' para un botón con borde azul oscuro, como en la imagen --}}
                <button class="btn btn-outline btn-primary shadow-lg text-lg">
                    Botón
                </button>
            </div>
        </section>

        {{-- --- Separador --- --}}
        <hr class="border-t border-gray-700/50 mb-16 md:mb-24">

        {{-- Sección 1: Encabezado (Texto a la Izquierda, Imagen a la Derecha) --}}
        <section class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center mb-16 md:mb-24">

            {{-- Bloque de Texto y Botón --}}
            <div class="space-y-6">
                <h2 class="text-4xl font-bold text-blue-400">
                    Encabezado
                </h2>
                <p class="text-lg text-gray-300">
                    Un subtítulo para esta sección, tan largo o tan corto como quieras
                </p>
                {{-- Botón (Mismo estilo que el hero para consistencia) --}}
                <button class="btn btn-outline btn-primary shadow-md">
                    Botón
                </button>
            </div>

            {{-- Bloque de Imagen Oscura --}}
            <div class="bg-[#0d0d40] h-64 md:h-96 rounded-lg shadow-xl border-2 border-blue-900">
                {{-- Aquí puedes colocar una imagen con <img src="..." alt="..." /> --}}
            </div>
        </section>

        {{-- Sección 2: Encabezado (Imagen a la Izquierda, Texto a la Derecha) --}}
        {{-- Se usa la clase 'md:grid-flow-col-dense' o 'md:grid-cols-2' con orden inverso para alternar --}}
        <section class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">

            {{-- Bloque de Imagen Oscura (Se invierte el orden visual en desktop con 'md:order-last') --}}
            <div class="bg-[#0d0d40] h-64 md:h-96 rounded-lg shadow-xl border-2 border-blue-900 md:order-last">
                {{-- Aquí puedes colocar una imagen con <img src="..." alt="..." /> --}}
            </div>

            {{-- Bloque de Texto y Botón (Se mantiene en el orden original para móvil) --}}
            <div class="space-y-6">
                <h2 class="text-4xl font-bold text-blue-400">
                    Encabezado
                </h2>
                <p class="text-lg text-gray-300">
                    Un subtítulo para esta sección, tan largo o tan corto como quieras
                </p>
                {{-- Botón --}}
                <button class="btn btn-outline btn-primary shadow-md">
                    Botón
                </button>
            </div>
        </section>

    </main>
</x-layouts.layout>
