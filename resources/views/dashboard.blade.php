<x-app-layout>
    <x-page-header 
        title="Dashboard"
        :breadcrumbs="[['label' => 'Dashboard']]" 
    />

    <div class="py-6">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Card Usuários --}}
                <a href="{{ route('usuarios.index') }}" class="bg-white border rounded-lg shadow hover:shadow-md transition flex flex-col h-full">
                    <div class="p-4 flex justify-center">
                        {{-- Ícone --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="8.5" cy="7" r="4"/>
                            <path d="M20 8v6"/>
                            <path d="M23 11h-6"/>
                        </svg>
                    </div>
                    <div class="px-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">Usuários</h3>
                        <p class="text-sm text-gray-500">Gerenciar usuários</p>
                    </div>
                    
                </a>

                {{-- Card Doações --}}
                <a href="{{ route('doacoes.index') }}" class="bg-white border rounded-lg shadow hover:shadow-md transition flex flex-col h-full">
                    <div class="p-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 21C12 21 4 13.657 4 8.5A4.5 4.5 0 0 1 8.5 4C10.24 4 11.91 5 12 6.5C12.09 5 13.76 4 15.5 4A4.5 4.5 0 0 1 20 8.5C20 13.657 12 21 12 21Z"/>
                        </svg>
                    </div>
                    <div class="px-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">Doações</h3>
                        <p class="text-sm text-gray-500">Gerenciar doações</p>
                    </div>
                    
                </a>

                {{-- Card Eventos --}}
                <a href="{{ route('eventos.index') }}" class="bg-white border rounded-lg shadow hover:shadow-md transition flex flex-col h-full">
                    <div class="p-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <div class="px-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">Eventos</h3>
                        <p class="text-sm text-gray-500">Gerenciar eventos</p>
                    </div>
                    
                </a>

                {{-- Card Cestas Básicas --}}
                <a href="{{ route('cestas.index') }}" class="bg-white border rounded-lg shadow hover:shadow-md transition flex flex-col h-full">
                    <div class="p-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <circle cx="9" cy="21" r="1"/>
            <circle cx="20" cy="21" r="1"/>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
        </svg>
                    </div>
                    <div class="px-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">Cestas Básicas</h3>
                        <p class="text-sm text-gray-500">Gerenciar cestas básicas</p>
                    </div>
                    
                </a>

                @if(auth()->user()->isAdmin())
                {{-- Card Pedidos de Voluntários --}}
                <a href="{{ route('admin.voluntarios.index') }}" class="bg-white border rounded-lg shadow hover:shadow-md transition flex flex-col h-full">
                    <div class="p-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 8s1-2 4-2 5 2 5 2 2-2 5-2 4 2 4 2v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8z"/>
                            <path d="M12 15l-1 1-1-1"/>
                        </svg>
                    </div>
                    <div class="px-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">Pedidos de Voluntários</h3>
                        <p class="text-sm text-gray-500">Gerenciar Pedidos</p>
                    </div>
                    
                </a>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
