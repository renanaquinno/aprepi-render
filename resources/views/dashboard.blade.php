<x-app-layout>
    <x-page-header 
    title="Dashboard"
    :breadcrumbs="[
        ['label' => 'Dashboard']
    ]"
    />
    <div class="py-2">
        <div class="mx-auto rounded-md mb-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Card Usuários --}}
                <a href="{{ route('usuarios.index') }}"
                   class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-blue-600">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-xl font-bold text-gray-800">Usuários</h3>
                            <p class="text-sm text-gray-500">Gerenciar usuários</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                            Listar Usuários
                        </button>
                    </div>
                </a>

                {{-- Card Doações --}}
                <a href="{{ route('doacoes.index') }}"
                   class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-green-600">
                            <i class="fas fa-hand-holding-heart fa-2x"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-xl font-bold text-gray-800">Doações</h3>
                            <p class="text-sm text-gray-500">Gerenciar doações</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                            Listar Doações
                        </button>
                    </div>
                </a>

                {{-- Card Eventos --}}
                <a href="{{ route('eventos.index') }}" class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-purple-600">
                            <i class="fas fa-cogs fa-2x"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-xl font-bold text-gray-800">Eventos</h3>
                            <p class="text-sm text-gray-500">Gerenciar eventos</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700">
                            Listar Eventos
                        </button>
                    </div>
                </a>

                {{-- Card Cestas Basicas --}}
                <a href="{{ route('cestas.index') }}" class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-purple-600">
                            <i class="fas fa-cogs fa-2x"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-xl font-bold text-gray-800">Cestas Básicas</h3>
                            <p class="text-sm text-gray-500">Gerenciar cestas básicas</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="w-full bg-yellow-600 text-white py-2 rounded hover:bg-yellow-700">
                            Listar Cestas Básicas
                        </button>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>
