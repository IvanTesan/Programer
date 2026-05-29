<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-blue-500 mb-2" style="text-shadow: 0 0 10px #0056ff;">
                Verificación de Email
            </h1>
            <p class="text-gray-400">¡Gracias por registrarte! Antes de comenzar, por favor verifica tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar. Si no lo recibiste, con gusto te enviaremos otro.</p>
        </div>

        <div class="card bg-gray-800 shadow-2xl p-8 border border-gray-700">
            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 text-sm text-success font-medium">
                    Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste al registrarte.
                </div>
            @endif

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-4">
                <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                    @csrf
                    <button class="btn btn-primary w-full sm:w-auto px-8">
                        Reenviar Correo de Verificación
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto text-center sm:text-right">
                    @csrf
                    <button type="submit" class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
