<x-app-layout>
    
    <x-page-header 
        title="Gerenciamento de Doações"
        :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Doações', 'url' => route('doacoes.index')],
            ['label' => isset($doacao) ? 'Editar' : 'Novo']
        ]"
    />

    <div class="py-2">
        <div class="bg-white shadow-md rounded-lg p-8">
            <form method="POST" action="{{ isset($doacao) ? route('doacoes.update', $doacao->id) : route('doacoes.store') }}">
                @csrf
                @if(isset($doacao))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Doador --}}
                    <div>
                        <x-input-label for="user_id" value="Doador" />
                        <select name="user_id" id="user_id" required
                            class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Selecione um doador</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" 
                                    {{ (isset($doacao) && $doacao->user_id == $usuario->id) ? 'selected' : '' }}>
                                    {{ $usuario->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Data --}}
                    <div>
                        <x-input-label for="data_doacao" value="Data" />
                        <x-text-input type="date" name="data_doacao"
                            value="{{ old('data_doacao', isset($doacao) ? \Carbon\Carbon::parse($doacao->data_doacao)->format('Y-m-d') : '') }}"
                            class="w-full" required />
                            
                    </div>

                    {{-- Valor --}}
                    <div>
                        <x-input-label for="valor" value="Valor" />
                        <x-text-input type="number" step="0.01" name="valor"
                            value="{{ old('valor', $doacao->valor ?? '') }}" class="w-full" required />
                    </div>

                    {{-- Forma de Pagamento --}}
                    <div>
                        <x-input-label for="forma_pagamento" value="Forma de Pagamento" />
                        <select name="forma_pagamento" id="forma_pagamento" required
                            class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Selecione</option>
                            <option value="pix" {{ (isset($doacao) && $doacao->forma_pagamento == 'pix') ? 'selected' : '' }}>Pix</option>
                            <option value="cartao" {{ (isset($doacao) && $doacao->forma_pagamento == 'cartao') ? 'selected' : '' }}>Cartão</option>
                            <option value="boleto" {{ (isset($doacao) && $doacao->forma_pagamento == 'boleto') ? 'selected' : '' }}>Boleto</option>
                            <option value="dinheiro" {{ (isset($doacao) && $doacao->forma_pagamento == 'dinheiro') ? 'selected' : '' }}>Dinheiro</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div>
                        <x-input-label for="status" value="Status" />
                        <select name="status" id="status" required
                            class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Selecione</option>
                            <option value="realizada" {{ (isset($doacao) && $doacao->status == 'realizada') ? 'selected' : '' }}>Realizada</option>
                            <option value="pendente" {{ (isset($doacao) && $doacao->status == 'pendente') ? 'selected' : '' }}>Pendente</option>
                            <option value="cancelada" {{ (isset($doacao) && $doacao->status == 'cancelada') ? 'selected' : '' }}>Cancelada</option>
                        </select>
                    </div>

                    {{-- Observações (ocupa coluna inteira) --}}
                    <div class="md:col-span-2">
                        <x-input-label for="observacoes" value="Observações" />
                        <textarea name="observacoes" id="observacoes" rows="3"
                            class="w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('observacoes', $doacao->observacoes ?? '') }}</textarea>
                    </div>
                </div>

                {{-- Botões --}}
                <div class="flex justify-end gap-4 mt-6">
                    <x-secondary-button onclick="window.location='{{ route('doacoes.index') }}'">
                        Cancelar
                    </x-secondary-button>

                    <x-primary-button class="bg-sky-800 hover:bg-sky-900">
                        {{ isset($doacao) ? 'Atualizar' : 'Cadastrar' }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
