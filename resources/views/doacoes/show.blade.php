<x-app-layout>
    <x-page-header 
        title="Detalhes da Doação"
        :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Doações', 'url' => route('doacoes.index')],
            ['label' => 'Detalhes']
        ]"
    />

    <div class="py-2">
        <div class="bg-white rounded-md mb-6 p-4">
            <h2 class="text-2xl font-semibold mb-4">Doação #{{ $doacao->id }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Data da Doação:</strong> {{ \Carbon\Carbon::parse($doacao->data_doacao)->format('d/m/Y') }}</p>
                    <p><strong>Valor:</strong> R$ {{ number_format($doacao->valor, 2, ',', '.') }}</p>
                    <p><strong>Forma de Pagamento:</strong> {{ ucfirst($doacao->forma_pagamento) }}</p>
                </div>
                <div>
                    <p><strong>Status:</strong> {{ ucfirst($doacao->status) }}</p>
                    <p><strong>Doado por:</strong> {{ $doacao->user?->name ?? 'Usuário não informado' }}</p>
                    <p><strong>Criado em:</strong> {{ $doacao->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold">Observações</h3>
                <p class="mt-2 text-gray-700">
                    {{ $doacao->observacoes ?? 'Sem observações.' }}
                </p>
            </div>

            <div class="mt-6 flex justify-end gap-4">
                {{-- Botão Voltar --}}
                <x-secondary-button onclick="window.location='{{ route('doacoes.index') }}'">
                    Voltar
                </x-secondary-button>

                {{-- Botão Editar --}}
                <x-primary-button onclick="window.location='{{ route('doacoes.edit', $doacao) }}'" class="bg-blue-800 hover:bg-blue-900">
                    Editar
                </x-primary-button>

                {{-- Botão Excluir --}}
                <form action="{{ route('doacoes.destroy', $doacao) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta doação?')">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>
                        Excluir
                    </x-danger-button>
                </form>
            </div>
        </div>
    </div>

    {{-- Histórico de logs --}}
    <x-log-list :logs="$doacao->activities" />
</x-app-layout>
